@extends('frontend.layouts.layout')

@section('head')
<title>Service | {{ $service->title }} | Cloudily</title>
<meta name="description" content="Cloudily">
<meta name="keywords" content="Cloudily">

@endsection

@section('content')
 <!--======= Breadcrumb Left With BG Image =======-->
 <section class="overview-block-ptb iq-over-black-70 jarallax iq-breadcrumb3 text-left iq-font-white" style="background-image: url('{{ asset('/images/austin-distel-gUIJ0YszPig-unsplash-min.jpg') }}'); background-position: center center; background-repeat: no-repeat; background-size: cover;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="iq-mb-0">
                    <h2 class="iq-font-white iq-tw-6">Service | {{ $service->title }}</h2>
                </div>
            </div>
            <div class="col-lg-4">
                <nav aria-label="breadcrumb" class="text-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('pages.home') }}"><i class="ion-android-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Service > {{ $service->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!--======= Breadcrumb Left With BG Image =======-->
<div class="main-content">
    <div class="overview-block-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                        <div class="item"><img class="img-fluid " src="{{ asset('/storage/'. $service->featured_image) }}" alt="#"></div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="item">
                        <div class="iq-feature10 iq-mtb-20">
                            <div class="right">
                                <h2 class="iq-tw-6 iq-mb-10">{{ $service->title }}</h2>
                                {!! $service->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (count($portfolio))
        <section class="overview-block-pt grey-bg popup-gallery">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="heading-title text-center">
                            <h2 class="title iq-tw-6">Our Portfolio</h2>
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
                                            <h5 class="title iq-font-white"><a href="{{ $project->link }}" target="_blank">{{ $project->title }}</a></h5>
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
</div>
@endsection
