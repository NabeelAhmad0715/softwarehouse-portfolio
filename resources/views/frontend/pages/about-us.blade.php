@extends('frontend.layouts.layout')

@section('head')
<title>About us | Titanium</title>
<meta name="description" content="Titanium">
<meta name="keywords" content="Titanium">

@endsection

@section('content')
 <!--======= Breadcrumb Left With BG Image =======-->
 <section class="overview-block-ptb iq-over-black-70 jarallax iq-breadcrumb3 text-left iq-font-white" style="background-image: url('images/bg/03.jpg'); background-position: center center; background-repeat: no-repeat; background-size: cover;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="iq-mb-0">
                    <h2 class="iq-font-white iq-tw-6">About Us</h2>
                </div>
            </div>
            <div class="col-lg-4">
                <nav aria-label="breadcrumb" class="text-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home-1.html"><i class="ion-android-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us 2</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!--======= Breadcrumb Left With BG Image =======-->
<div class="main-content">
    <section class="overview-block-ptb iq-hide">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12 iq-best-box">
                    <h3 class="small-title iq-tw-6">We Are Best</h3>
                    <p> Lorem Ipsum is simply dummy text ever sincehar the 1500s, when an unknownshil printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries. Simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <p> Lorem Ipsum is simply dummy text ever sincehar the 1500s, when an unknownshil printer took.</p>
                    <a class="button" href="#" role="button">Read More</a>
                </div>
                <div class="col-lg-6 col-sm-12 iq-re-9-mt50">
                    <img class="img-fluid center-block" src="images/bg/03.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="overview-block-ptb iq-over-black-80 iq-bg jarallax" style="background-image: url('images/bg/26.jpg'); background-position: left center;">
        <div class="container">
            <div class="row iq-font-white">
                <div class="col-lg-6 col-sm-12 iq-mtb-15">
                    <div class="row">
                        <div class="col-sm-7">
                            <h4 class="iq-tw-6 small-title iq-font-white">Our Mission</h4>
                            <p>Standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            <div class="read-more white"><a href="#">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
                        </div>
                        <div class="col-sm-5 iq-re-4-mt30"><img alt="" class="img-fluid brd" src="images/feature/01.jpg"></div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 iq-mtb-15 pl-30 iq-re-4-mt50">
                    <div class="row">
                        <div class="col-sm-7">
                            <h4 class="iq-tw-6 small-title iq-font-white">Our Vision</h4>
                            <p>Standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            <div class="read-more white"><a href="#">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
                        </div>
                        <div class="col-sm-5 iq-re-4-mt30"><img alt="" class="img-fluid brd" src="images/feature/02.jpg"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="iq-action-blog green-bg particles-bg iq-ptb-40">
        <canvas id="canvas"></canvas>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9 col-md-9 col-sm-8  iq-font-white">
                    <h2 class="iq-font-white iq-fw-4 iq-pb-10">Curious about our services and
                        <strong class="iq-font-black">client</strong> stories?</h2>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 text-right"><a href="{{ route('pages.portfolio') }}" class="button white grey iq-re-4-mt30 iq-mr-0">Checkout out our Portfolio</a> </div>
            </div>
        </div>
    </div>

    
    <section id="team" class="iq-ptb-80 white-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="heading-title text-center">
                        <h2 class="title iq-tw-6">Meet Our Team</h2>
                        <p>Lorem Ipsum is simply dummy text ever sincehar the 1500s, when an unknownshil printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                    </div>
                </div>
            </div>
            <div class="row mt-30">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="iq-team7 text-center iq-mtb-15">
                        <div class="team-blog mb-30">
                            <div class="team-images"> <img class="img-fluid" src="images/team/team1.jpg" alt=""> </div>
                            <div class="team-description">
                                <div class="mt-10">+0123 456 789</div>
                                <div class="text-white">support@qwilo.com</div>
                            </div>
                            <div class="team-social">
                                <ul>
                                    <li> <a href="#"> <i class="ion-social-facebook-outline"></i> </a> </li>
                                    <li> <a href="#"> <i class="ion-social-twitter-outline"></i> </a> </li>
                                    <li> <a href="#"> <i class="ion-social-rss-outline"></i> </a> </li>
                                    <li> <a href="#"> <i class="ion-social-googleplus-outline"></i> </a> </li>
                                </ul>
                            </div>
                        </div>
                        <h6 class="iq-tw-6 iq-mt-10"><a href="portfolio-single-1.html">Rinks Cooper</a></h6>
                        <p>CEO, Qwilo</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 iq-re-4-mt30">
                    <div class="iq-team7 text-center iq-mtb-15">
                        <div class="team-blog mb-30">
                            <div class="team-images"> <img class="img-fluid" src="images/team/team2.jpg" alt=""> </div>
                            <div class="team-description">
                                <div class="mt-10">+0123 456 789</div>
                                <div class="text-white">support@qwilo.com</div>
                            </div>
                            <div class="team-social">
                                <ul>
                                    <li> <a href="#"> <i class="ion-social-facebook-outline"></i> </a> </li>
                                    <li> <a href="#"> <i class="ion-social-twitter-outline"></i> </a> </li>
                                    <li> <a href="#"> <i class="ion-social-rss-outline"></i> </a> </li>
                                    <li> <a href="#"> <i class="ion-social-googleplus-outline"></i> </a> </li>
                                </ul>
                            </div>
                        </div>
                        <h6 class="iq-tw-6 iq-mt-10"><a href="portfolio-single-1.html">JD Scot</a></h6>
                        <p>CEO, Qwilo</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 iq-re-9-mt30">
                    <div class="iq-team7 text-center iq-mtb-15">
                        <div class="team-blog mb-30">
                            <div class="team-images"> <img class="img-fluid" src="images/team/team3.jpg" alt=""> </div>
                            <div class="team-description">
                                <div class="mt-10">+0123 456 789</div>
                                <div class="text-white">support@qwilo.com</div>
                            </div>
                            <div class="team-social">
                                <ul>
                                    <li> <a href="#"> <i class="ion-social-facebook-outline"></i> </a> </li>
                                    <li> <a href="#"> <i class="ion-social-twitter-outline"></i> </a> </li>
                                    <li> <a href="#"> <i class="ion-social-rss-outline"></i> </a> </li>
                                    <li> <a href="#"> <i class="ion-social-googleplus-outline"></i> </a> </li>
                                </ul>
                            </div>
                        </div>
                        <h6 class="iq-tw-6 iq-mt-10"><a href="portfolio-single-1.html">Haris Morgan</a></h6>
                        <p>CEO, Qwilo</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 iq-re-9-mt30">
                    <div class="iq-team7 text-center iq-mtb-15">
                        <div class="team-blog mb-30">
                            <div class="team-images"> <img class="img-fluid" src="images/team/team4.jpg" alt=""> </div>
                            <div class="team-description">
                                <div class="mt-10">+0123 456 789</div>
                                <div class="text-white">support@qwilo.com</div>
                            </div>
                            <div class="team-social">
                                <ul>
                                    <li> <a href="#"> <i class="ion-social-facebook-outline"></i> </a> </li>
                                    <li> <a href="#"> <i class="ion-social-twitter-outline"></i> </a> </li>
                                    <li> <a href="#"> <i class="ion-social-rss-outline"></i> </a> </li>
                                    <li> <a href="#"> <i class="ion-social-googleplus-outline"></i> </a> </li>
                                </ul>
                            </div>
                        </div>
                        <h6 class="iq-tw-6 iq-mt-10"><a href="portfolio-single-1.html">JD Scot</a></h6>
                        <p>CEO, Qwilo</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="iq-tw-6 small-title iq-font-dark">Why Us?</h3>
                    <p> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                </div>
            </div>
        </div>
        <div class="iq-pt-50 iq-pb-30 iq-over-black-80 iq-bg jarallax iq-count-classic" style="background-image: url('images/bg/36.jpg'); background-position: left center;">
            <div class="container">
                <div class="row iq-counter3">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="iq-counter text-left">
                            <div class="left iq-font-white iq-mr-10"><i class="ion-ios-lightbulb-outline"></i> </div>
                            <div class="right">
                                <span class="timer iq-font-green iq-tw-6 iq-mt-0" data-to="575" data-speed="5000">575</span>
                                <div class="iq-lead iq-font-white">Projects Done</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="iq-counter text-left">
                            <div class="left iq-font-white iq-mr-10"><i class="ion-ios-heart-outline"></i> </div>
                            <div class="right">
                                <span class="timer iq-font-green iq-tw-6 iq-mt-0" data-to="1540" data-speed="5000">1540</span>
                                <div class="iq-lead iq-font-white">Satisfied Clients</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="iq-counter text-left">
                            <div class="left iq-font-white iq-mr-10"><i class="ion-ios-color-wand-outline"></i> </div>
                            <div class="right">
                                <span class="timer iq-font-green iq-tw-6 iq-mt-0" data-to="110" data-speed="5000">110</span>
                                <div class="iq-lead iq-font-white">Awards</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="iq-counter text-left">
                            <div class="left iq-font-white iq-mr-10"><i class="ion-ios-albums-outline"></i> </div>
                            <div class="right">
                                <span class="timer iq-font-green iq-tw-6 iq-mt-0" data-to="110" data-speed="5000">110</span>
                                <div class="iq-lead iq-font-white">Happy Clients</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="iq-bg iq-font-white iq-over-black-80 jarallax">
        <div class="container-fluid">
            <div class="row row-eq-height" style="justify-content: center">
                <div class="col-md-12 iq-pall-60 grey-bg iq-testimonial4">
                    <div id="testimonial-slider" class="owl-carousel owl-theme owl-loaded" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="2" data-items-laptop="2" data-items-tab="2" data-items-mobile="2" data-items-mobile-sm="2" data-margin="15">
                        <div class="testimonial">
                            <p class="description">
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            </p>
                            <h6 class="iq-tw-6">Rinks Cooper</h6>
                            <span>CEO, Qwilo</span>
                        </div>
                        <div class="testimonial">
                            <p class="description">
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            </p>
                            <h6 class="iq-tw-6">JD Scot</h6>
                            <span>CEO, Qwilo</span>
                        </div>
                        <div class="testimonial">
                            <p class="description">
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            </p>
                            <h6 class="iq-tw-6">Haris Morgan</h6>
                            <span>CEO, Qwilo</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
