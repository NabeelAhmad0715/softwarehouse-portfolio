@extends('frontend.layouts.layout')

@section('head')
<title>Portfolio | Cloudily</title>
<meta name="description" content="Cloudily">
<meta name="keywords" content="Cloudily">

@endsection

@section('content')
 <!--======= Breadcrumb Left With BG Image =======-->
<section class="overview-block-ptb iq-over-black-70 jarallax iq-breadcrumb3 text-left iq-font-white" style="background-image: url('{{ asset('/images/campaign-creators-gMsnXqILjp4-unsplash-min.jpg') }}'); background-position: center center; background-repeat: no-repeat; background-size: cover;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="iq-mb-0">
                    <h2 class="iq-font-white iq-tw-6">Portfolio</h2>
                </div>
            </div>
            <div class="col-lg-4">
                <nav aria-label="breadcrumb" class="text-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('pages.home') }}"><i class="ion-android-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Portfolio</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!--======= Breadcrumb Left With BG Image =======-->
@if (count($portfolio))
    <div class="main-content popup-gallery">
        <div class="overview-block-ptb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="iq-tw-6 small-title iq-font-dark">Our Prtfoliox</h3>
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
        </div>
    </div>
@endif
@endsection
