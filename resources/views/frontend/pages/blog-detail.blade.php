@extends('frontend.layouts.layout')

@section('head')
<title>Blogs | {{ $blog->title }} | Cloudily</title>
<meta name="description" content="Cloudily">
<meta name="keywords" content="Cloudily">

@endsection

@section('content')
 <!--======= Breadcrumb Left With BG Image =======-->
 <section class="overview-block-ptb iq-over-black-70 jarallax iq-breadcrumb3 text-left iq-font-white" style="background-image: url('{{ asset('/storage/' . $blog->featured_image) }}'); background-position: center center; background-repeat: no-repeat; background-size: cover;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="iq-mb-0">
                    <h2 class="iq-font-white iq-tw-6">Blogs | {{ $blog->title }}</h2>
                </div>
            </div>
            <div class="col-lg-4">
                <nav aria-label="breadcrumb" class="text-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('pages.home') }}"><i class="ion-android-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blogs > {{ $blog->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!--======= Breadcrumb Left With BG Image =======-->
<div class="main-content">
    <section class="iq-blog overview-block-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 iq-mtb-15">
                    <div class="iq-blog-entry iq-audio">
                        <div class="iq-pos-r">
                            <div class="iq-blog-detail">
                                <div class="iq-entry-title iq-mb-10 iq-mt-10">
                                    <a href="#">
                                        <h5 class="iq-tw-6">{{ $blog->title }}</h5>
                                    </a>
                                </div>
                                <ul class="iq-entry-meta iq-mt-10">
                                    <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $blog->location }}</a></li>
                                    <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> {{ $blog->published_date->format('d F y') }}</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="iq-entry-image clearfix">
                            <img class="img-fluid" src="{{ asset('/storage/' . $blog->body_image) }}" alt="#">
                        </div>
                        <div class="iq-pos-r">
                            <div class="iq-blog-detail">
                                <div class="iq-entry-content">
                                    {!! $blog->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if (count($blog->sections))
        <div class="overview-block-ptb iq-hide grey-bg">
            <div class="container">
                @foreach ($blog->sections as $index => $section)
                    @if (!$section->image)
                    <div class="row iq-mt-50">
                        <div class="col-lg-12 col-md-12">
                            <div class="iq-feature7 wow fadeInLeft" data-wow-duration="1.5s" style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInLeft;">
                                <div class="feature-aria">
                                    <div class="feature-content">
                                        <h3 class="iq-font-dark iq-tw-6 iq-mb-10 iq-re-9-mt30">{{ $section->title }}</h3>
                                        {!! $section->description !!}                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                    @else
                        @if ($index % 2 === 0)
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="feature-aria">
                                        <img class="img-fluid wow fadeInLeft" data-wow-duration="1s" src="{{ asset('/storage/'. $section->image) }}" alt="" style="visibility: visible; animation-duration: 1s; animation-name: fadeInLeft;">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="iq-feature7 wow fadeInRight" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-name: fadeInRight;">
                                        <div class="feature-aria">
                                            <div class="feature-content">
                                                <h3 class="iq-font-dark iq-tw-6 iq-mb-10 iq-re-9-mt30">{{ $section->title }}</h3>
                                                {!! $section->description !!}                                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row iq-mt-50">
                                <div class="col-lg-6 col-md-12">
                                    <div class="iq-feature7 wow fadeInLeft" data-wow-duration="1.5s" style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInLeft;">
                                        <div class="feature-aria">
                                            <div class="feature-content">
                                                <h3 class="iq-font-dark iq-tw-6 iq-mb-10 iq-re-9-mt30">{{ $section->title }}</h3>
                                                {!! $section->description !!}                                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 iq-re-9-mt30">
                                    <div class="feature-aria">
                                        <img class="img-fluid wow fadeInRight" data-wow-duration="1s" src="{{ asset('/storage/'. $section->image) }}" alt="" style="visibility: visible; animation-duration: 1s; animation-name: fadeInLeft;">
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
