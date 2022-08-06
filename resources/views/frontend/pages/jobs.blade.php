@extends('frontend.layouts.layout')

@section('head')
<title>Jobs | Cloudily</title>
<meta name="description" content="Cloudily">
<meta name="keywords" content="Cloudily">

@endsection

@section('content')
 <!--======= Breadcrumb Left With BG Image =======-->
 <section class="overview-block-ptb iq-over-black-70 jarallax iq-breadcrumb3 text-left iq-font-white" style="background-image: url('{{ asset('/images/pointing-4190930_1920.jpg') }}'); background-position: center center; background-repeat: no-repeat; background-size: cover;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="iq-mb-0">
                    <h2 class="iq-font-white iq-tw-6">Jobs</h2>
                </div>
            </div>
            <div class="col-lg-4">
                <nav aria-label="breadcrumb" class="text-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('pages.home') }}"><i class="ion-android-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Jobs</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!--======= Breadcrumb Left With BG Image =======-->
@if (count($careers))
    <div class="main-content">
        <section class="overview-block-ptb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="heading-title text-center">
                            <h2 class="title iq-tw-6">Our Jobs</h2>
                        </div>
                    </div>
                </div>
                <div class="row iq-mt-30">
                    <div class="col-sm-12">
                        @foreach ($careers as $career)
                            <a href="{{ route('pages.job-details', $career->slug) }}">
                                <div class="iq-feature8">
                                    <img src="{{ asset('/storage/'. $career->icon) }}" alt="icon1">
                                    <h6 class="iq-font-black iq-tw-6 iq-pt-20 iq-pb-10">{{ $career->title }}</h6>
                                    {!! Str::words($career->description, 30) !!}
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
@endif
@endsection
