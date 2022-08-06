@extends('frontend.layouts.layout')

@section('head')
<title>Homepage | Cloudily</title>
<meta name="description" content="Cloudily">
<meta name="keywords" content="Cloudily">

@endsection

@section('content')
<div class="white-bg p-0 iq-over-black-70" style="position: sticky;">
    <div class="owl-carousel arrow-1" data-autoplay="true" data-loop="true" data-nav="true" data-dots="false" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="15">
        <div class="item">
            <img style="width:1519px; height:600px" class="img-fluid" src="{{ asset('/images/shaking-hands-2965055_1920.jpg') }}" alt="">
        </div>
        <div class="item">
            <img style="width:1519px; height:600px" class="img-fluid" src="{{ asset('/images/network-2402637_1280.jpg') }}" alt="">
        </div>
        <div class="item">
            <img style="width:1519px; height:600px" class="img-fluid" src="{{ asset('/images/hand-3044387_1280.jpg') }}" alt="">
        </div>
        <div class="item">
            <img style="width:1519px; height:600px" class="img-fluid" src="{{ asset('/images/devops-3155972-min.jpg') }}" alt="">
        </div>
        <div class="item">
            <img style="width:1519px; height:600px" class="img-fluid" src="{{ asset('/images/hand-3108175_1920.jpg') }}" alt="">
        </div>
    </div>
</div>

<div class="main-content">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-12 iq-mt-40">
                    <div class="iq-feature11 text-center iq-plr-10">
                        <div class="icon-bg text-center"><i aria-hidden="true" class="ion-ios-cloud"></i>
                            <div class="step">1</div>
                        </div>
                        <h5 class="iq-tw-6 iq-mt-20 iq-mb-10 text-transform">Cloud infrastructure managed services</h5>
                        <p class="iq-mall-0">
                            Wherever you are on your cloud journey, we can help you stabilize, optimize and manage your IT infrastructure for future growth and transformation</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12 iq-mt-40">
                    <div class="iq-feature11 text-center iq-plr-10 iq-re-4-mt30">
                        <div class="icon-bg text-center"><i aria-hidden="true" class="fa fa-lock"></i>
                            <div class="step">2</div>
                        </div>
                        <h5 class="iq-tw-6 iq-mt-20 iq-mb-10 text-transform">Cloud and infrastructure security
                            </h5>
                        <p class="iq-mall-0">
                            Strengthen customer & employee trust with proactive, industry-relevant threat intelligence woven into your cloud & infrastructure fabric.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12 iq-mt-40">
                    <div class="iq-feature11 text-center iq-plr-10 iq-re-4-mt30">
                        <div class="icon-bg text-center"><i aria-hidden="true" class="ion-ios-list-outline"></i>
                            <div class="step">3</div>
                        </div>
                        <h5 class="iq-tw-6 iq-mt-20 iq-mb-10 text-transform">
                            Cloud & data center
                        </h5>
                        <p class="iq-mall-0">
                            Transform, integrate and manage your cloud and infrastructure workloads to take full advantage of the Cloud Continuum.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12 iq-mt-40">
                    <div class="iq-feature11 text-center iq-plr-10 iq-re-4-mt30">
                        <div class="icon-bg text-center"><i aria-hidden="true" class="ion-ios-monitor-outline"></i>
                            <div class="step">4</div>
                        </div>
                        <h5 class="iq-tw-6 iq-mt-20 iq-mb-10 text-transform">
                            Service management
                        </h5>
                        <p class="iq-mall-0">
                            Digitize service management to accelerate service delivery, elevate human experience, integrate across functions and rationalize costs.                        </div>
                </div>
            </div>
        </div>
    </section>

    @if (count($services))
        <section class="overview-block-ptb iq-bg iq-over-black-70" style="background-image:url({{ asset('/images/campaign-creators-gMsnXqILjp4-unsplash-min.jpg') }}); background-position: right bottom; ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="heading-title text-center">
                            <h2 class="title iq-tw-6 text-white">Services We Provide</h2>
                            <p class="text-white">Cloud First offers a full spectrum of cloud services to help you realise the value from your investment. We know cloud is more than just technology, so our solutions encompass the workforce and culture change needed for lasting success.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($services as $service)
                        <div class="col-lg-4 col-md-6 col-sm-12 iq-mt-30">
                            <div class="white-bg iq-ptb-30 iq-pl-15 iq-pr-15" style="height:409px">
                                <div class="iq-box text-center">
                                    <img alt="" src="{{ asset('/storage/'. $service->icon) }}">
                                    <h5 class="iq-tw-6 iq-mt-10 iq-font-black text-transform">{{ $service->title }}</h5>
                                    {!! Str::words($service->description, 30) !!}
                                    <div class="read-more white black"><a href="{{ route('pages.service-details', $service->slug) }}">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if (count($portfolio))
        <section class="overview-block-pt grey-bg popup-gallery">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="heading-title text-center">
                            <h2 class="title iq-tw-6">Our Portfolio</h2>
                            <p>Today, more than ever, companies need to operate and compete at an unprecedented speed and scale as industries are reshaping beneath them. This means innovating faster, creating new revenue streams, deriving more insights from data – and from the edge – and interacting differently with their customers, partners and employees. All of these changes are fundamental, inter-connected and require a catalyst to drive them – and that is cloud.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                        <div class="isotope iq-columns-4">
                            @foreach ($portfolio as $project)
                                <div class="iq-grid-item photography">
                                    <div class="iq-portfolio-03">
                                        <a class="iq-portfolio-img" href="#">
                                                <img class="img-fluid" src="{{ asset('/storage/'. $project->featured_image) }}" alt="#">
                                            </a>
                                        <div class="iq-portfolio-content">
                                            <h5 class="title iq-font-white text-transform"><a href="{{ $project->link }}" target="_blank" class="text-transform">{{ $project->title }}</a></h5>
                                            <ul class="iq-portfolio-icon">
                                            <li><a href="{{ $project->link }}" target="_blank"><i class="fa fa-link"></i></a></li>
                                            <li><a class="image-link popup-img" href="{{ asset('/storage/'. $project->featured_image) }}"><i class="fa fa-arrows-alt"></i></a></li>
                                        </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="overview-block-ptb iq-hide">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 iq-mtb-15">
                    <div class="feature-aria">
                        <img class="img-fluid wow fadeInLeft" data-wow-duration="1s" src="{{ asset('/images/pexels-mikhail-nilov-7988238-min.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 iq-mtb-15">
                    <div class="iq-feature7 wow fadeInRight" data-wow-duration="1s">
                        <div class="feature-aria">
                            <div>
                                <h3 class="iq-font-dark iq-tw-6 text-transform">How we work </h3>
                                <p>Most AI and automation conversations focus on technology—that's the easy part. We work holistically across people, processes and business functions to ensure your initiatives are deployed, embraced and scaled for maximum ROI.
                                </p>
                                <div class="row">
                                    <div class="col-md-4">
                                        <h5 class="text-primary text-center font-weight-bold">Plan</h5>
                                        <p class="text-center">We start with a maturity assessment and a strategic road map that align to your business priorities</p>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="text-primary text-center font-weight-bold">Implement</h5>
                                        <p class="text-center">We have extensive deployment experience across a variety of business, IT and industrial settings.</p>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="text-primary text-center font-weight-bold">Manage</h5>
                                        <p class="text-center">We can manage and optimize solutions as well as help you set up your own dedicated centers of excellence.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row iq-mt-50">
                <div class="col-lg-6 col-md-12 iq-mtb-15">
                    <div class="iq-feature7 wow fadeInLeft" data-wow-duration="1.5s">
                        <div class="feature-aria">
                            <div>
                                <h3 class="iq-font-dark iq-tw-6 text-transform">Our capabilities
                                </h3>
                                <p>Our automation services integrate analytics with AI and industry expertise. Whether it's a chatbot or another solution, we'll help you decide how to apply it, which technologies to use and how to make sure it's embraced across your business.
                                </p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="text-primary text-center font-weight-bold">Solutions.AI
                                        </h5>
                                        <p class="text-center">
                                            Solve your most important business challenges—fast.
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="text-primary text-center font-weight-bold text-transform">
                                            Business process automation
                                        </h5>
                                        <p class="text-center">
                                            Robotic process automation (RPA) can be used to reinvent marketing, procurement, finance, HR, asset... </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 iq-mtb-15 iq-re-9-mt30 order-first order-lg-2">
                    <div class="feature-aria">
                        <img class="img-fluid wow fadeInRight" data-wow-duration="1.5s" src="{{ asset('/images/marvin-meyer-SYTO3xs06fU-unsplash-min.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="overview-block-ptb4 iq-over-black-70 iq-bg jarallax iq-why-us" style="background-image: url('{{ asset('/images/blogging-2620148_1920.jpg') }}'); background-position: left center;">
        <div class="container">
            <div class="row iq-counter3">
                <div class="col-lg-12 col-md-12 col-sm-12 iq-mtb-15 iq-font-white">
                    <div class="small-title text-left">
                        <h4 class="title iq-tw-6 iq-font-white">Join the team</h4>
                    </div>
                    <p>There has never been a better time to join our global team of infrastructure professionals. Join us and gain early access to innovations, work with the biggest clients and build cross-domain expertise. Go as far as your ambition takes you.</p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 iq-mtb-15">
                    <div class="iq-counter brd text-left iq-ptb-30 iq-pl-10 iq-pr-10" style="height:215px">
                        <div class="right">
                            <span class="timer iq-font-green iq-tw-6 iq-mt-0" data-to="19" data-speed="5000">19</span>
                            <div class="iq-lead iq-font-white">Industry-specific cloud executive briefings, providing a C-suite view of cloud business cases based on our industry roadmaps to the cloud.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 iq-mtb-15">
                    <div class="iq-counter brd text-left iq-ptb-30 iq-pl-10 iq-pr-10" style="height:215px">
                        <div class="right">
                            <span class="timer iq-font-green iq-tw-6 iq-mt-0" data-to="12" data-speed="5000">12</span>
                            <div class="iq-lead iq-font-white">Industry-specific, enterprise architecture blueprints, offering fully integrated, application and data architecture roadmaps and data models for the optimal cloud-powered enterprise.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 iq-mtb-15">
                    <div class="iq-counter brd text-left iq-ptb-30 iq-pl-10 iq-pr-10" style="height:215px">
                        <div class="right">
                            <span class="timer iq-font-green iq-tw-6 iq-mt-0" data-to="100" data-speed="5000">100</span>
                            <div class="iq-lead iq-font-white">Industry-specific and pre-configured cloud solutions, co-developed with our 17 ecosystem hyperscale/cloud and platform business group partners.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <hr>
    @if (count($blogs))
        <section class="iq-blog overview-block-ptb iq-pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="heading-title text-center">
                            <h2 class="title iq-tw-6">Our Recent Blog</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="3" data-items-laptop="3" data-items-tab="2" data-items-mobile="1" data-items-mobile-sm="1" data-margin="15">
                            @foreach ($blogs as $blog)
                                <div class="item">
                                    <div class="iq-blog-entry white-bg">
                                        <div class="iq-entry-image clearfix">
                                            <img style="height:200px;width:350px" class="img-fluid" src="{{ asset('/storage/' . $blog->featured_image) }}" alt="#">
                                            <span class="tag"><i class="ion-image"></i> {{ $blog->location }}</span>
                                            <span class="date">{{ $blog->published_date->format('d') }}<small>{{ $blog->published_date->format('F') }}</small></span>
                                        </div>
                                        <div class="iq-blog-detail" style="height: 250px">
                                            <div class="iq-entry-title iq-mb-10">
                                                <a href="{{ route('pages.blog-details', $blog->slug) }}">
                                                    <h5 class="iq-tw-6">{{ $blog->title }}</h5>
                                                </a>
                                            </div>
                                            <div class="iq-entry-content">
                                                {!! Str::words($blog->description,25) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
</div>
@endsection
