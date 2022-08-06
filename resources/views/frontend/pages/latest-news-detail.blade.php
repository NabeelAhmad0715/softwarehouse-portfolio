@extends('frontend.layouts.layout')

@section('head')
<title>Latest News | {{ $latestNew->title }} | Cloudily</title>
<meta name="description" content="Cloudily">
<meta name="keywords" content="Cloudily">

@endsection

@section('content')
 <!--======= Breadcrumb Left With BG Image =======-->
 <section class="overview-block-ptb iq-over-black-70 jarallax iq-breadcrumb3 text-left iq-font-white" style="background-image: url('{{ asset('/storage/' . $latestNew->featured_image) }}'); background-position: center center; background-repeat: no-repeat; background-size: cover;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="iq-mb-0">
                    <h2 class="iq-font-white iq-tw-6">Latest News | {{ $latestNew->title }}</h2>
                </div>
            </div>
            <div class="col-lg-4">
                <nav aria-label="breadcrumb" class="text-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('pages.home') }}"><i class="ion-android-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Latest News > {{ $latestNew->title }}</li>
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
                                        <h5 class="iq-tw-6">{{ $latestNew->title }} ({{ $latestNew->published_date->format('d F y') }})</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="iq-entry-image clearfix">
                            <img class="img-fluid" src="{{ asset('/storage/' . $latestNew->body_image) }}" alt="#">
                        </div>
                        <div class="iq-pos-r">
                            <div class="iq-blog-detail">
                                <div class="iq-entry-content">
                                    {!!  $latestNew->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
