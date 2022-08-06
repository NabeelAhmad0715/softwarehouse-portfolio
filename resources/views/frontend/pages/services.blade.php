@extends('frontend.layouts.layout')

@section('head')
<title>Services | Cloudily</title>
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
                    <h2 class="iq-font-white iq-tw-6">Services</h2>
                </div>
            </div>
            <div class="col-lg-4">
                <nav aria-label="breadcrumb" class="text-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('pages.home') }}"><i class="ion-android-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Services</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!--======= Breadcrumb Left With BG Image =======-->
<div class="main-content">
    <section class="overview-block-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="heading-title text-center">
                        <h2 class="title iq-tw-6">Our Services</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6 col-sm-12 iq-mtb-15">
                        <div class="white-bg iq-ptb-30 iq-pl-15 iq-pr-15">
                            <div class="iq-box text-center">
                                <img alt="" src="{{ asset('/storage/'. $service->icon) }}">
                                <h5 class="iq-tw-6 iq-mt-20 iq-font-black">{{ $service->title }}</h5>
                                {!! Str::words($service->description, 30) !!}
                                <div class="read-more green"><a href="{{ route('pages.service-details', [$service->slug]) }}">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection
