@extends('frontend.layouts.layout')

@section('head')
<title>Contact us | Titanium</title>
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
                    <h2 class="iq-font-white iq-tw-6">Contact Us</h2>
                </div>
            </div>
            <div class="col-lg-4">
                <nav aria-label="breadcrumb" class="text-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home-1.html"><i class="ion-android-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact Us 2</li>
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
                        <p>Lorem Ipsum is simply dummy text ever sincehar the 1500s, when an unknownshil printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 iq-mtb-15">
                    <div class="white-bg iq-ptb-30 iq-pl-15 iq-pr-15">
                        <div class="iq-box text-center">
                            <img src="images/services/icon/finance-icon1.png" alt="icon1">
                            <h5 class="iq-tw-6 iq-mt-20 iq-font-black">Creative Ideas</h5>
                            <p>Text ever sincehar the 1500s, when an unknownshil printer took a galley of type and scrambled it to make.</p>
                            <div class="read-more green"><a href="{{ route('pages.service-details') }}">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 iq-mtb-15">
                    <div class="white-bg iq-ptb-30 iq-pl-15 iq-pr-15">
                        <div class="iq-box text-center">
                            <img src="images/services/icon/finance-icon2.png" alt="icon1">
                            <h5 class="iq-tw-6 iq-mt-20 iq-font-black">Perfect Documentations</h5>
                            <p>Text ever sincehar the 1500s, when an unknownshil printer took a galley of type and scrambled it to make.</p>
                            <div class="read-more green"><a href="{{ route('pages.service-details') }}">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 iq-mtb-15">
                    <div class="white-bg iq-ptb-30 iq-pl-15 iq-pr-15">
                        <div class="iq-box text-center">
                            <img src="images/services/icon/finance-icon3.png" alt="icon1">
                            <h5 class="iq-tw-6 iq-mt-20 iq-font-black">User Friendly</h5>
                            <p>Text ever sincehar the 1500s, when an unknownshil printer took a galley of type and scrambled it to make.</p>
                            <div class="read-more green"><a href="{{ route('pages.service-details') }}">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 iq-mtb-15">
                    <div class="white-bg iq-ptb-30 iq-pl-15 iq-pr-15">
                        <div class="iq-box text-center">
                            <img src="images/services/icon/finance-icon4.png" alt="icon1">
                            <h5 class="iq-tw-6 iq-mt-20 iq-font-black">Easy to Customize</h5>
                            <p>Text ever sincehar the 1500s, when an unknownshil printer took a galley of type and scrambled it to make.</p>
                            <div class="read-more green"><a href="{{ route('pages.service-details') }}">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 iq-mtb-15">
                    <div class="white-bg iq-ptb-30 iq-pl-15 iq-pr-15">
                        <div class="iq-box text-center">
                            <img src="images/services/icon/finance-icon5.png" alt="icon1">
                            <h5 class="iq-tw-6 iq-mt-20 iq-font-black">Fully Responsive</h5>
                            <p>Text ever sincehar the 1500s, when an unknownshil printer took a galley of type and scrambled it to make.</p>
                            <div class="read-more green"><a href="{{ route('pages.service-details') }}">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 iq-mtb-15">
                    <div class="white-bg iq-ptb-30 iq-pl-15 iq-pr-15">
                        <div class="iq-box text-center">
                            <img src="images/services/icon/finance-icon6.png" alt="icon1">
                            <h5 class="iq-tw-6 iq-mt-20 iq-font-black">Modern Design</h5>
                            <p>Text ever sincehar the 1500s, when an unknownshil printer took a galley of type and scrambled it to make.</p>
                            <div class="read-more green"><a href="{{ route('pages.service-details') }}">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
