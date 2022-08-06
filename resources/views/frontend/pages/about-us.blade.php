@extends('frontend.layouts.layout')

@section('head')
<title>About us | Cloudily</title>
<meta name="description" content="Cloudily">
<meta name="keywords" content="Cloudily">

@endsection

@section('content')
 <!--======= Breadcrumb Left With BG Image =======-->
 <section class="overview-block-ptb iq-over-black-70 jarallax iq-breadcrumb3 text-left iq-font-white" style="background-image: url('{{ asset('/images/imprint-2508603_1920.jpg') }}'); background-position: center center; background-repeat: no-repeat; background-size: cover;">
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
                        <li class="breadcrumb-item"><a href="{{ route('pages.home') }}"><i class="ion-android-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
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
                    <p class="paragraph">Cloudily offers software development consulting services for businesses, startups, and enterprises. Partner with a reliable software development company to scale up your engineering capacity.
                        The seasoned professionals and industry veterans that lead our teams and departments. Cloudily is driven by the profound experience and business acumen that these gifted individuals share with us every day.
                    </p>
                    <a class="button" href="{{ route('pages.home') }}" role="button">Read More</a>
                </div>
                <div class="col-lg-6 col-sm-12 iq-re-9-mt50">
                    <img class="img-fluid center-block" src="{{ asset('/images/marvin-meyer-SYTO3xs06fU-unsplash-min.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="overview-block-ptb iq-over-black-80 iq-bg jarallax" style="background-image: url('{{ asset('/images/marvin-meyer-SYTO3xs06fU-unsplash-min.jpg') }}'); background-position: left center;">
        <div class="container">
            <div class="row iq-font-white">
                <div class="col-lg-6 col-sm-12 iq-mtb-15">
                    <div class="row">
                        <div class="col-sm-7">
                            <h4 class="iq-tw-6 small-title iq-font-white">Our Mission</h4>
                            <p>As a constantly-evolving tech company, we are committed to serving the needs of customers around the world by making best software that is
                                easy to use, powerful and accessible.
                                
                                We will continue to innovative and challenge existing workflows to save significant time in their work processes and designs.</p>
                        </div>
                        <div class="col-sm-5 iq-re-4-mt30"><img alt="" class="img-fluid brd" src="{{ asset('/images/vision-2372177_1920.jpg') }}"></div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 iq-mtb-15 pl-30 iq-re-4-mt50">
                    <div class="row">
                        <div class="col-sm-7">
                            <h4 class="iq-tw-6 small-title iq-font-white">Our Vision</h4>
                            <p>To be the first marketing choice of national and international organizations. We are experts in our profession with great market influence, confidence and a good reputation. We aim to achieve the vision of our client’s company or brand and work on strategies aimed to reach satisfication.</p>
                        </div>
                        <div class="col-sm-5 iq-re-4-mt30"><img alt="" class="img-fluid brd" src="{{ asset('/images/business-idea-3683781_1920.jpg') }}"></div>
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


    {{-- <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="iq-tw-6 small-title iq-font-dark">Why Us?</h3>
                    <p> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                </div>
            </div>
        </div>
        <div class="iq-pt-50 iq-pb-30 iq-over-black-80 iq-bg jarallax iq-count-classic" style="background-image: url('{{ asset('/images/devops-3155972-min.jpg') }}'); background-position: left center;">
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
    </section> --}}

    {{-- @if (count($testimonials))
        <div class="overview-block-pt iq-over-black-80 iq-pb-120 iq-testimonial iq-bg jarallax" style="background-image: url('{{ asset('/images/pexels-mikhail-nilov-7988238-min.jpg') }}'); background-position: center bottom;">
            <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                <div class="heading-title text-center">
                    <h2 class="title iq-tw-6 text-white">Testimonial</h2>
                </div>
                </div>
            </div>
            <div class="row iq-mt-10">
                <div class="col-lg-12 col-md-12">
                <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="3" data-items-laptop="3" data-items-tab="2" data-items-mobile="1" data-items-mobile-sm="1" data-margin="15">
                    @foreach ($testimonials as $testimony)
                        <div class="item">
                            <div class="feedback">
                                <div class="iq-info bg-light">
                                <p>{{ $testimony->message }}</p>
                                </div>
                                <div class="iq-mt-30">
                                <div class="iq-avtar iq-mr-20"> <img alt="" class="img-fluid center-block" src="{{ asset('/storage/' . $testimony->image) }}"></div>
                                <div class="avtar-name">
                                    <div class="iq-lead iq-mb-0 iq-tw-6 iq-font-green">{{ $testimony->name }}</div>
                                </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                </div>
            </div>
            </div>
        </div>
    @endif --}}
</div>
@endsection
