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
class CompletedCrawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'novel:data';

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

    public function details($crawler, $novelStatus)
    {
        $content_text = $crawler->filter('.post .m-card .post-content .box')->each(
            function (Crawler $node, $i)  use ($novelStatus) {
                $title = $node->filter('.box .caption a')->text();
                Log::info($title);
                $searchNovel = Novel::where('slug', Str::slug($title))->first();
                if (!$searchNovel) {
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
                    // Fetch every possible node

                    $image = $crawlerDetail->filter('.post .single-page .post-content .nov-head amp-img')->attr('src');
                    $description = $crawlerDetail->filter('#panelnovelinfo .desc p')->each(
                        function (Crawler $node, $i) {
                            $list[] = str_replace('mtlnovel', 'novelfeast', str_replace('mtl', 'novel feast', str_replace('mtl', 'novel feast', str_replace('MTL', 'Novel Feast', $node->text()))));
                            return $list;
                        }
                    );

                    $status = $crawlerDetail->filter('#panelnovelinfo table.info tbody tr')->each(function (Crawler $node, $i) {
                        $list[] = str_replace('mtlnovel', 'novelfeast', str_replace('mtl', 'novel feast', str_replace('mtl', 'novel feast', str_replace('MTL', 'Novel Feast', $node->text()))));
                        return $list;
                    });

                    $chapter_list_href = $crawlerDetail->filter('#panelchapterlist .view-all')->attr('href');

                    $url = $chapter_list_href;
                    echo $url;
                    //Create the DOM Object using URL
                    $dom = new \DOMDocument();
                    libxml_use_internal_errors(true);
                    $dom->loadHTMLFile($url);
                    $html = $dom->saveHTML();
                    // Create Crawler Object with the HTML of URL
                    $ChapterDetails = new Crawler($html);

                    $chapters = $ChapterDetails->filter('.ch-list p a')->each(function (Crawler $node, $i) {

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
                    return $items;
                }
            }
        );
        return $content_text;
    }
    public function getData()
    {
        Log::info("Crawling Started");
        try {
            // URL list to scrap text
            $url = 'https://www.mtlnovel.com/status/completed/';
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
            for ($i = 0; $i < $pages; $i++) {
                if ($i <= 0) {
                    $novels_list[] = $this->details($crawler, 'completed');
                } else {
                    $nextPageUrl = 'https://www.mtlnovel.com/status/completed/page/' . $i . '/';
                    Log::info($nextPageUrl);
                    //Create the DOM Object using URL
                    $nextPageDom = new \DOMDocument();
                    libxml_use_internal_errors(true);
                    $nextPageDom->loadHTMLFile($nextPageUrl);
                    $nextPageHtml = $nextPageDom->saveHTML();
                    // Create Crawler Object with the HTML of URL
                    $nextPage = new Crawler($nextPageHtml);
                    Log::info("Next page");
                    $novels_list[] = $this->details($nextPage, 'completed');
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
}
