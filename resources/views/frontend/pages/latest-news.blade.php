@extends('frontend.layouts.layout')

@section('head')
<title>Blogs | Titanium</title>
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
                    <h2 class="iq-font-white iq-tw-6">Blogs</h2>
                </div>
            </div>
            <div class="col-lg-4">
                <nav aria-label="breadcrumb" class="text-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home-1.html"><i class="ion-android-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blogs 2</li>
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
                <div class="col-lg-4 col-md-6 iq-mt-20">
                    <div class="iq-blog-entry white-bg">
                        <div class="iq-entry-image clearfix">
                            <img class="img-fluid" src="images/blog/01.jpg" alt="#">
                        </div>
                        <div class="iq-blog-detail">
                            <div class="iq-entry-title iq-mb-10">
                                <a href="{{ route('pages.latest-news-details') }}">
                                    <h5 class="iq-tw-6">Blogpost With Image</h5>
                                </a>
                            </div>
                            <div class="iq-entry-content">
                                <p>Simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
