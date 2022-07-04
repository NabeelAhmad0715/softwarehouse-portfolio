<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Novel;
use App\Chapter;
use App\Rating;
use App\Genre;
use App\Tag;
use App\Author;
use Illuminate\Support\Str;
use App\Image;
use App\Status;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

ini_set('max_execution_time', 0);
ini_set('memory_limit', '-1');
ini_set('default_socket_timeout', 760000000000000000000000000000000000000000000000000000000000);
// Load necessary files
use Symfony\Component\DomCrawler\Crawler;

require __DIR__ . '/../../../vendor/autoload.php';

class OngoingCrawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'novel:ongoing';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get novels data through crawler';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return $this->getData();
    }

    public function getData()
    {
        Log::info("Ongoing Crawling Started");
        try {
            // URL list to scrap text
            $url = 'https://www.mtlnovel.com/status/ongoing/';
            $result_text = [];
            Log::info($url);
            //Create the DOM Object using URL
            $dom = new \DOMDocument();
            libxml_use_internal_errors(true);
            $dom->loadHTMLFile($url);
            $html = $dom->saveHTML();
            // Create Crawler Object with the HTML of URL
            $crawler = new Crawler($html);
            // Fetch every possible node
            $lastPage = $crawler->filter('.post .m-card #pagination a')->last()->attr('href');
            $novels_list = [];
            $pages = explode('/', $lastPage)[4];
            for ($i = 0; $i <= $pages; $i++) {
                if ($i <= 0) {
                    $novels_list[] = $this->details($crawler, 'ongoing');
                } else {
                    $nextPageUrl = 'https://www.mtlnovel.com/status/ongoing/page/' . $i . '/';
                    Log::info($nextPageUrl);
                    //Create the DOM Object using URL
                    $nextPageDom = new \DOMDocument();
                    libxml_use_internal_errors(true);
                    $nextPageDom->loadHTMLFile($nextPageUrl);
                    $nextPageHtml = $nextPageDom->saveHTML();
                    // Create Crawler Object with the HTML of URL
                    $nextPage = new Crawler($nextPageHtml);
                    Log::info("Next page");
                    $novels_list[] = $this->details($nextPage, 'ongoing');
                }
            }
            $result_text[$url] = $novels_list;
            // Save Data in File
            $fp = fopen('content.csv', 'w');
            fputcsv($fp, array('Site URL', 'image', 'href', 'Title', 'Rating', 'Description', 'Status', 'Chapters'));
            foreach ($result_text as $url => $content) {
                // $content = array_unique($content);
                foreach ($content as $text) {
                    if (!empty($text)) {
                        fputcsv($fp, array($url, $text['image'], $text['href'], $text['title'], $text['rating'], json_encode($text['description']), json_encode($text['status']), json_encode($text['chapters'])));
                    }
                }
            }
            fclose($fp);
            echo "<br><br><br>";
            echo '<h2>File Saved!</h2><h4>Please check content.csv</h4>';
            echo "<br><br><br>";
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function details($crawler, $novelStatus)
    {
        $content_text = $crawler->filter('.post .m-card .post-content .box')->each(
            function (Crawler $node, $i)  use ($novelStatus) {
                $title = $node->filter('.box .caption a')->text();
                Log::info($title);
                $href = $node->filter('.box .caption a')->attr('href');
                $rating = $node->filter('.box .caption .views-icon span')->text();
                $url = $href;
                $result_text = [];
                echo $url;
                echo "<br>";
                //Create the DOM Object using URL
                $dom = new \DOMDocument();
                libxml_use_internal_errors(true);
                $dom->loadHTMLFile($url);
                $html = $dom->saveHTML();
                // Create Crawler Object with the HTML of URL
                $crawlerDetail = new Crawler($html);

                // Image
                $image = $crawlerDetail->filter('.post .single-page .post-content .nov-head amp-img')->attr('src');
                $description = $crawlerDetail->filter('#panelnovelinfo .desc p')->each(
                    function (Crawler $node, $i) {
                        $list[] = str_replace('mtlnovel', 'novelfeast', str_replace('mtl', 'novel feast', str_replace('mtl', 'novel feast', str_replace('MTL', 'Novel Feast', $node->text()))));
                        return $list;
                    }
                );

                // Status
                $status = $crawlerDetail->filter('#panelnovelinfo table.info tbody tr')->each(function (Crawler $node, $i) {
                    $list[] = str_replace('mtlnovel', 'novelfeast', str_replace('mtl', 'novel feast', str_replace('mtl', 'novel feast', str_replace('MTL', 'Novel Feast', $node->text()))));
                    return $list;
                });

                $chapter_list_href = $crawlerDetail->filter('#panelchapterlist .view-all')->attr('href');

                $url = $chapter_list_href;
                // $url = "https://www.mtlnovel.com/i-a-hundred-billion-boss-signed-in-the-city-for-eight-years/chapter-list/";
                echo $url;
                //Create the DOM Object using URL
                $dom = new \DOMDocument();
                libxml_use_internal_errors(true);
                $dom->loadHTMLFile($url);
                $html = $dom->saveHTML();
                // Create Crawler Object with the HTML of URL
                $ChapterDetails = new Crawler($html);

                $chapters = $ChapterDetails->filter('.ch-list p a')->first();
                $searchNovel = Novel::where('slug', Str::slug($title, '-'))->first();
                if ($searchNovel) {
                    if ($searchNovel->chapters->count() != 0) {
                        $searchChapter = $searchNovel->chapters->where('slug', Str::slug($chapters->filter('a')->text(), '-'))->first();
                        if (!$searchChapter) {

                            $counterList = $ChapterDetails->filter('.ch-list p a')->count();
                            $countChapters = $searchNovel->chapters->count();
                            $counter = $counterList - $countChapters;
                            if ($counter > 0) {
                                $chapters = $ChapterDetails->filter('.ch-list p a')->each(function (Crawler $node, $i) use ($counter, $searchNovel) {
                                    $chaptersRecords = array();
                                    if ($i < $counter) {
                                        $chapter_href = $node->attr('href');
                                        // $chapter_number = explode(' ', $node->filter('a')->text())[1];
                                        $chapter_name = $node->filter('a')->text();

                                        $url = $chapter_href;
                                        echo $url;
                                        //Create the DOM Object using URL
                                        $dom = new \DOMDocument();
                                        libxml_use_internal_errors(true);
                                        $dom->loadHTMLFile($url);
                                        $html = $dom->saveHTML();
                                        // Create Crawler Object with the HTML of URL
                                        $crawlerChapterDetail = new Crawler($html);

                                        $chapter_details = $crawlerChapterDetail->filter('.post-content .par p')->each(function (Crawler $node, $i) {
                                            $list[] = str_replace('mtlnovel', 'novelfeast', str_replace('mtl', 'novel feast', str_replace('mtlnovel', 'novelfeast', str_replace('mtl', 'novel feast', str_replace('mtl', 'novel feast', str_replace('MTL', 'Novel Feast', $node->text()))))));
                                            return $list;
                                        });

                                        $chaptersRecords = [
                                            'chapter_name' => $chapter_name,
                                            'chapter_href' => $chapter_href,
                                            'chapter_details' => $chapter_details
                                        ];
                                    }
                                    return $chaptersRecords;
                                });
                                foreach ($chapters as $chapter) {
                                    if (count($chapter) > 0) {
                                        $chapterText = '';
                                        foreach ($chapter['chapter_details'] as $value) {
                                            if ($chapterText == '') {
                                                $chapterText = $chapterText . "" . $value[0];
                                            } else {
                                                $chapterText = $chapterText . " <br><br><br> " . $value[0];
                                            }
                                        }

                                        $chapter = Chapter::create([
                                            'novel_id' => $searchNovel->id,
                                            'name' => $chapter['chapter_name'],
                                            'slug' => Str::slug($chapter['chapter_name'], '-'),
                                            'href' => $chapter['chapter_href'],
                                            'details' => $chapterText,
                                        ]);
                                    }
                                }
                                $items = [
                                    'image' => $image,
                                    'href' => $href,
                                    'title' => $title,
                                    'rating' => $rating,
                                    'description' => $description,
                                    'status' => $status,
                                    'chapters' => $chapters
                                ];
                                return $items;
                            } else {

                                $chapters = $ChapterDetails->filter('.ch-list p a')->each(function (Crawler $node, $i) use ($counter) {
                                    $chaptersRecords = array();
                                    if ($i < $counter) {
                                        $chapter_href = $node->attr('href');
                                        // $chapter_number = explode(' ', $node->filter('a')->text())[1];
                                        $chapter_name = $node->filter('a')->text();

                                        $url = $chapter_href;
                                        echo $i;
                                        //Create the DOM Object using URL
                                        $dom = new \DOMDocument();
                                        libxml_use_internal_errors(true);
                                        $dom->loadHTMLFile($url);
                                        $html = $dom->saveHTML();
                                        // Create Crawler Object with the HTML of URL
                                        $crawlerChapterDetail = new Crawler($html);

                                        $chapter_details = $crawlerChapterDetail->filter('.post-content .par p')->each(function (Crawler $node, $i) {
                                            $list[] = str_replace('mtlnovel', 'novelfeast', str_replace('mtl', 'novel feast', str_replace('mtlnovel', 'novelfeast', str_replace('mtl', 'novel feast', str_replace('mtl', 'novel feast', str_replace('MTL', 'Novel Feast', $node->text()))))));
                                            return $list;
                                        });

                                        $chaptersRecords = [
                                            'chapter_name' => $chapter_name,
                                            'chapter_href' => $chapter_href,
                                            'chapter_details' => $chapter_details
                                        ];
                                    }
                                    return $chaptersRecords;
                                });

                                $items = [
                                    'image' => $image,
                                    'href' => $href,
                                    'title' => $title,
                                    'rating' => $rating,
                                    'description' => $description,
                                    'status' => $status,
                                    'chapters' => $chapters
                                ];
                                $descriptionText = '';
                                foreach ($items['description'] as $description) {
                                    $descriptionText = $descriptionText . " </br> " . $description[0];
                                }

                                foreach ($status as $detail) {
                                    $detail = explode(':', $detail[0]);
                                    if ($detail[0] == 'Short Title') {
                                        $shortTitle =  $detail[1];
                                    } else if ($detail[0] == 'Alternate Title') {
                                        $alternateTitle = $detail[1];
                                    }
                                }
                                $status_id = Status::select('id')->where('slug', $novelStatus)->first();
                                $novel = Novel::create([
                                    'title' => $items['title'],
                                    'slug' => Str::slug($items['title'], '-'),
                                    'href' => $items['href'],
                                    'image' => $items['image'],
                                    'description' => $descriptionText,
                                    'short_title' => $shortTitle,
                                    'alternate_title' => $alternateTitle,
                                    'status_id' => $status_id->id,
                                ]);

                                $rating = Rating::create([
                                    'novel_id' => $novel->id,
                                    'rating' => $items['rating'],
                                ]);
                                foreach ($status as $detail) {
                                    $detail = explode(':', $detail[0]);
                                    if ($detail[0] == 'Author') {
                                        Author::create([
                                            'novel_id' => $novel->id,
                                            'title' => $detail[1],
                                            'slug' => Str::slug($detail[1], '-'),
                                        ]);
                                    } else if ($detail[0] == 'Genre') {
                                        foreach (explode(', ', $detail[1]) as $value) {
                                            $genre = $value;
                                            $hello = Genre::create([
                                                'novel_id' => $novel->id,
                                                'title' => $genre,
                                                'slug' => Str::slug($genre, '-'),
                                            ]);
                                        }
                                    } else if ($detail[0] == 'Tags') {
                                        foreach (explode(', ', $detail[1]) as $value) {
                                            $tag = str_replace(',', '', $value);
                                            Tag::create([
                                                'novel_id' => $novel->id,
                                                'title' => $tag,
                                                'slug' => Str::slug($tag, '-'),
                                            ]);
                                        }
                                    }
                                }

                                $path = $items['image'];
                                $extension = explode('.', $path);
                                $name = Str::random(15) . '.' . end($extension);
                                Storage::disk('s3')->put('images/' . $name, file_get_contents($path));
                                // Storage::setVisibility('images/' . $name, 'public');
                                $storageUrl = Storage::disk('s3')->url('images/' . $name);
                                $image = Image::create([
                                    'name' => basename($name),
                                    'url' => $storageUrl,
                                    'image_type' => 'featured_image',
                                    'imageable_id' => $novel->id,
                                    'imageable_type' => Novel::class
                                ]);
                                if (count($items['chapters']) > 0) {
                                    foreach ($items['chapters'] as $chapter) {
                                        if (count($chapter) > 0) {
                                            $chapterText = '';
                                            foreach ($chapter['chapter_details'] as $value) {
                                                if ($chapterText == '') {
                                                    $chapterText = $chapterText . "" . $value[0];
                                                } else {
                                                    $chapterText = $chapterText . " <br><br><br> " . $value[0];
                                                }
                                            }

                                            $chapter = Chapter::create([
                                                'novel_id' => $novel->id,
                                                'name' => $chapter['chapter_name'],
                                                'slug' => Str::slug($chapter['chapter_name'], '-'),
                                                'href' => $chapter['chapter_href'],
                                                'details' => $chapterText,
                                            ]);
                                        }
                                    }
                                }
                                return $items;
                            }
                        }
                    } else {
                        $counterList = $ChapterDetails->filter('.ch-list p a')->count();
                        $countChapters = $searchNovel->chapters->count();
                        $counter = $counterList - $countChapters;
                        if ($counter > 0) {
                            $chapters = $ChapterDetails->filter('.ch-list p a')->each(function (Crawler $node, $i) use ($counter, $searchNovel) {
                                $chaptersRecords = array();
                                if ($i < $counter) {
                                    $chapter_href = $node->attr('href');
                                    // $chapter_number = explode(' ', $node->filter('a')->text())[1];
                                    $chapter_name = $node->filter('a')->text();

                                    $url = $chapter_href;
                                    echo $url;
                                    //Create the DOM Object using URL
                                    $dom = new \DOMDocument();
                                    libxml_use_internal_errors(true);
                                    $dom->loadHTMLFile($url);
                                    $html = $dom->saveHTML();
                                    // Create Crawler Object with the HTML of URL
                                    $crawlerChapterDetail = new Crawler($html);

                                    $chapter_details = $crawlerChapterDetail->filter('.post-content .par p')->each(function (Crawler $node, $i) {
                                        $list[] = str_replace('mtlnovel', 'novelfeast', str_replace('mtl', 'novel feast', str_replace('mtlnovel', 'novelfeast', str_replace('mtl', 'novel feast', str_replace('mtl', 'novel feast', str_replace('MTL', 'Novel Feast', $node->text()))))));
                                        return $list;
                                    });

                                    $chaptersRecords = [
                                        'chapter_name' => $chapter_name,
                                        'chapter_href' => $chapter_href,
                                        'chapter_details' => $chapter_details
                                    ];
                                }
                                return $chaptersRecords;
                            });
                            foreach ($chapters as $chapter) {
                                if (count($chapter) > 0) {
                                    $chapterText = '';
                                    foreach ($chapter['chapter_details'] as $value) {
                                        if ($chapterText == '') {
                                            $chapterText = $chapterText . "" . $value[0];
                                        } else {
                                            $chapterText = $chapterText . " <br><br><br> " . $value[0];
                                        }
                                    }

                                    $chapter = Chapter::create([
                                        'novel_id' => $searchNovel->id,
                                        'name' => $chapter['chapter_name'],
                                        'slug' => Str::slug($chapter['chapter_name'], '-'),
                                        'href' => $chapter['chapter_href'],
                                        'details' => $chapterText,
                                    ]);
                                }
                            }
                            $items = [
                                'image' => $image,
                                'href' => $href,
                                'title' => $title,
                                'rating' => $rating,
                                'description' => $description,
                                'status' => $status,
                                'chapters' => $chapters
                            ];
                            return $items;
                        } else {
                            if ($counterList > 0) {
                                $chapters = $ChapterDetails->filter('.ch-list p a')->each(function (Crawler $node, $i) use ($counter) {
                                    $chaptersRecords = array();
                                    if ($i < $counter) {
                                        $chapter_href = $node->attr('href');
                                        // $chapter_number = explode(' ', $node->filter('a')->text())[1];
                                        $chapter_name = $node->filter('a')->text();

                                        $url = $chapter_href;
                                        echo $i;
                                        //Create the DOM Object using URL
                                        $dom = new \DOMDocument();
                                        libxml_use_internal_errors(true);
                                        $dom->loadHTMLFile($url);
                                        $html = $dom->saveHTML();
                                        // Create Crawler Object with the HTML of URL
                                        $crawlerChapterDetail = new Crawler($html);

                                        $chapter_details = $crawlerChapterDetail->filter('.post-content .par p')->each(function (Crawler $node, $i) {
                                            $list[] = str_replace('mtlnovel', 'novelfeast', str_replace('mtl', 'novel feast', str_replace('mtlnovel', 'novelfeast', str_replace('mtl', 'novel feast', str_replace('mtl', 'novel feast', str_replace('MTL', 'Novel Feast', $node->text()))))));
                                            return $list;
                                        });

                                        $chaptersRecords = [
                                            'chapter_name' => $chapter_name,
                                            'chapter_href' => $chapter_href,
                                            'chapter_details' => $chapter_details
                                        ];
                                    }
                                    return $chaptersRecords;
                                });

                                $items = [
                                    'image' => $image,
                                    'href' => $href,
                                    'title' => $title,
                                    'rating' => $rating,
                                    'description' => $description,
                                    'status' => $status,
                                    'chapters' => $chapters
                                ];
                                $descriptionText = '';
                                foreach ($items['description'] as $description) {
                                    $descriptionText = $descriptionText . " </br> " . $description[0];
                                }

                                foreach ($status as $detail) {
                                    $detail = explode(':', $detail[0]);
                                    if ($detail[0] == 'Short Title') {
                                        $shortTitle =  $detail[1];
                                    } else if ($detail[0] == 'Alternate Title') {
                                        $alternateTitle = $detail[1];
                                    }
                                }
                                $status_id = Status::select('id')->where('slug', $novelStatus)->first();
                                $novel = Novel::create([
                                    'title' => $items['title'],
                                    'slug' => Str::slug($items['title'], '-'),
                                    'href' => $items['href'],
                                    'image' => $items['image'],
                                    'description' => $descriptionText,
                                    'short_title' => $shortTitle,
                                    'alternate_title' => $alternateTitle,
                                    'status_id' => $status_id->id,
                                ]);

                                $rating = Rating::create([
                                    'novel_id' => $novel->id,
                                    'rating' => $items['rating'],
                                ]);
                                foreach ($status as $detail) {
                                    $detail = explode(':', $detail[0]);
                                    if ($detail[0] == 'Author') {
                                        Author::create([
                                            'novel_id' => $novel->id,
                                            'title' => $detail[1],
                                            'slug' => Str::slug($detail[1], '-'),
                                        ]);
                                    } else if ($detail[0] == 'Genre') {
                                        foreach (explode(', ', $detail[1]) as $value) {
                                            $genre = $value;
                                            $hello = Genre::create([
                                                'novel_id' => $novel->id,
                                                'title' => $genre,
                                                'slug' => Str::slug($genre, '-'),
                                            ]);
                                        }
                                    } else if ($detail[0] == 'Tags') {
                                        foreach (explode(', ', $detail[1]) as $value) {
                                            $tag = str_replace(',', '', $value);
                                            Tag::create([
                                                'novel_id' => $novel->id,
                                                'title' => $tag,
                                                'slug' => Str::slug($tag, '-'),
                                            ]);
                                        }
                                    }
                                }

                                $path = $items['image'];
                                $extension = explode('.', $path);
                                $name = Str::random(15) . '.' . end($extension);
                                Storage::disk('s3')->put('images/' . $name, file_get_contents($path));
                                // Storage::setVisibility('images/' . $name, 'public');
                                $storageUrl = Storage::disk('s3')->url('images/' . $name);
                                $image = Image::create([
                                    'name' => basename($name),
                                    'url' => $storageUrl,
                                    'image_type' => 'featured_image',
                                    'imageable_id' => $novel->id,
                                    'imageable_type' => Novel::class
                                ]);
                                if (count($items['chapters']) > 0) {
                                    foreach ($items['chapters'] as $chapter) {
                                        if (count($chapter) > 0) {
                                            $chapterText = '';
                                            foreach ($chapter['chapter_details'] as $value) {
                                                if ($chapterText == '') {
                                                    $chapterText = $chapterText . "" . $value[0];
                                                } else {
                                                    $chapterText = $chapterText . " <br><br><br> " . $value[0];
                                                }
                                            }

                                            $chapter = Chapter::create([
                                                'novel_id' => $novel->id,
                                                'name' => $chapter['chapter_name'],
                                                'slug' => Str::slug($chapter['chapter_name'], '-'),
                                                'href' => $chapter['chapter_href'],
                                                'details' => $chapterText,
                                            ]);
                                        }
                                    }
                                }
                                return $items;
                            }
                        }
                    }
                } else {
                    if ($ChapterDetails->filter('.ch-list p a')->count() > 0) {
                        $chapters = $ChapterDetails->filter('.ch-list p a')->each(function (Crawler $node, $i) {
                            $chaptersRecords = array();
                            $chapter_href = $node->attr('href');
                            // $chapter_number = explode(' ', $node->filter('a')->text())[1];
                            $chapter_name = $node->filter('a')->text();

                            $url = $chapter_href;
                            echo $i;
                            //Create the DOM Object using URL
                            $dom = new \DOMDocument();
                            libxml_use_internal_errors(true);
                            $dom->loadHTMLFile($url);
                            $html = $dom->saveHTML();
                            // Create Crawler Object with the HTML of URL
                            $crawlerChapterDetail = new Crawler($html);

                            $chapter_details = $crawlerChapterDetail->filter('.post-content .par p')->each(function (Crawler $node, $i) {
                                $list[] = str_replace('mtlnovel', 'novelfeast', str_replace('mtl', 'novel feast', str_replace('mtlnovel', 'novelfeast', str_replace('mtl', 'novel feast', str_replace('mtl', 'novel feast', str_replace('MTL', 'Novel Feast', $node->text()))))));
                                return $list;
                            });

                            $chaptersRecords = [
                                'chapter_name' => $chapter_name,
                                'chapter_href' => $chapter_href,
                                'chapter_details' => $chapter_details
                            ];
                            return $chaptersRecords;
                        });
                    } else {
                        $chapters = null;
                    }
                    $items = [
                        'image' => $image,
                        'href' => $href,
                        'title' => $title,
                        'rating' => $rating,
                        'description' => $description,
                        'status' => $status,
                        'chapters' => $chapters
                    ];
                    $descriptionText = '';
                    foreach ($items['description'] as $description) {
                        $descriptionText = $descriptionText . " </br> " . $description[0];
                    }

                    foreach ($status as $detail) {
                        $detail = explode(':', $detail[0]);
                        if ($detail[0] == 'Short Title') {
                            $shortTitle =  $detail[1];
                        } else if ($detail[0] == 'Alternate Title') {
                            $alternateTitle = $detail[1];
                        }
                    }
                    $status_id = Status::select('id')->where('slug', $novelStatus)->first();
                    $novel = Novel::create([
                        'title' => $items['title'],
                        'slug' => Str::slug($items['title'], '-'),
                        'href' => $items['href'],
                        'image' => $items['image'],
                        'description' => $descriptionText,
                        'short_title' => $shortTitle,
                        'alternate_title' => $alternateTitle,
                        'status_id' => $status_id->id,
                    ]);

                    $rating = Rating::create([
                        'novel_id' => $novel->id,
                        'rating' => $items['rating'],
                    ]);
                    foreach ($status as $detail) {
                        $detail = explode(':', $detail[0]);
                        if ($detail[0] == 'Author') {
                            Author::create([
                                'novel_id' => $novel->id,
                                'title' => $detail[1],
                                'slug' => Str::slug($detail[1], '-'),
                            ]);
                        } else if ($detail[0] == 'Genre') {
                            foreach (explode(', ', $detail[1]) as $value) {
                                $genre = $value;
                                $hello = Genre::create([
                                    'novel_id' => $novel->id,
                                    'title' => $genre,
                                    'slug' => Str::slug($genre, '-'),
                                ]);
                            }
                        } else if ($detail[0] == 'Tags') {
                            foreach (explode(', ', $detail[1]) as $value) {
                                $tag = str_replace(',', '', $value);
                                Tag::create([
                                    'novel_id' => $novel->id,
                                    'title' => $tag,
                                    'slug' => Str::slug($tag, '-'),
                                ]);
                            }
                        }
                    }

                    $path = $items['image'];
                    $extension = explode('.', $path);
                    $name = Str::random(15) . '.' . end($extension);
                    Storage::disk('s3')->put('images/' . $name, file_get_contents($path));
                    // Storage::setVisibility('images/' . $name, 'public');
                    $storageUrl = Storage::disk('s3')->url('images/' . $name);
                    $image = Image::create([
                        'name' => basename($name),
                        'url' => $storageUrl,
                        'image_type' => 'featured_image',
                        'imageable_id' => $novel->id,
                        'imageable_type' => Novel::class
                    ]);
                    if ($ChapterDetails->filter('.ch-list p a')->count() > 0) {
                        if (count($items['chapters']) > 0) {
                            foreach ($items['chapters'] as $chapter) {
                                if (count($chapter) > 0) {
                                    $chapterText = '';
                                    foreach ($chapter['chapter_details'] as $value) {
                                        if ($chapterText == '') {
                                            $chapterText = $chapterText . "" . $value[0];
                                        } else {
                                            $chapterText = $chapterText . " <br><br><br> " . $value[0];
                                        }
                                    }

                                    $chapter = Chapter::create([
                                        'novel_id' => $novel->id,
                                        'name' => $chapter['chapter_name'],
                                        'slug' => Str::slug($chapter['chapter_name'], '-'),
                                        'href' => $chapter['chapter_href'],
                                        'details' => $chapterText,
                                    ]);
                                }
                            }
                        }
                    }
                    return $items;
                }
            }
        );
        return $content_text;
    }
}
