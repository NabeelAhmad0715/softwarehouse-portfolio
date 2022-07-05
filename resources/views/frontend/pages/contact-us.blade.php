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
<!--=================================MAIN CONTENT -->
<div class="main-content iq-contact2">
    <!-- Contact Us 2 -->
    <div class="iq-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.840108181602!2d144.95373631539215!3d-37.8172139797516!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4c2b349649%3A0xb6899234e561db11!2sEnvato!5e0!3m2!1sen!2sin!4v1497005461921"></iframe>
    </div>
    <section class="iq-our-touch overview-block-pb">
        <div class="container">
            <div class="iq-get-in iq-pall-40 white-bg">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 iq-mtb-15">
                        <h4 class="heading-left iq-tw-6 iq-pb-20 iq-mb-20">Get in Touch</h4>
                        <form id="contact" method="post">
                            <div class="contact-form">
                                <div class="section-field iq-mt-10">
                                    <input class="require" id="contact_name" type="text" placeholder="Name*" name="name">
                                </div>
                                <div class="section-field iq-mt-10">
                                    <input class="require" id="contact_email" type="email" placeholder="Email*" name="email">
                                </div>
                                <div class="section-field iq-mt-10">
                                    <input class="require" id="contact_phone" type="text" placeholder="Phone*" name="phone">
                                </div>
                                <div class="section-field textarea iq-mt-10">
                                    <textarea id="contact_message" class="input-message require" placeholder="Comment*" rows="5" name="message"></textarea>
                                </div>
                                <div class="section-field">
                                <div class="g-recaptcha" data-sitekey="6Lc5XV4UAAAAAJzUmGomye9Peru8lXyzT22FH0lX"></div>
                            </div>
                                <button id="submit" name="submit" type="submit" value="Send" class="button pull-right iq-mt-20">Send Message</button>
                                <p role="alert"></p>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 iq-mtb-15">
                        <div class="contact-info iq-pall-60 iq-pt-0">
                            <h4 class="heading-left iq-tw-6 iq-mb-20 iq-pb-20">Contact Us</h4>
                            <div class="iq-contact-box media">
                                <div class="iq-icon left">
                                    <i aria-hidden="true" class="ion-ios-location-outline"></i>
                                </div>
                                <div class="contact-box right media-body">
                                    <h5 class="iq-tw-6">Address</h5>
                                    <p>1234 North Avenue Luke Lane, South Bend,IN 360001</p>
                                </div>
                            </div>
                            <div class=".iq-contact-box right media iq-mt-40">
                                <div class="iq-icon left">
                                    <i aria-hidden="true" class="ion-ios-telephone-outline"></i>
                                </div>
                                <div class="contact-box right media-body">
                                    <h5 class="iq-tw-6">Phone</h5>
                                    <span class="lead iq-tw-5">+0123 456 789</span>
                                    <div class="iq-mb-0">Mon-Fri 8:00am - 8:00pm</div>
                                </div>
                            </div>
                            <div class=".iq-contact-box right media iq-mt-40">
                                <div class="iq-icon left">
                                    <i aria-hidden="true" class="ion-ios-email-outline"></i>
                                </div>
                                <div class="contact-box right media-body">
                                    <h5 class="iq-tw-6">Mail</h5>
                                    <span class="lead iq-tw-5">support@appino.com</span>
                                    <div class="iq-mb-0">24 X 7 online support</div>
                                </div>
                            </div>
                            <ul class="info-share list-inline">
                                <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-github"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Us 2 -->
</div>
<!--=================================Main Content -->
@endsection
