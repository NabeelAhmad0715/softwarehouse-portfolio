@extends('frontend.layouts.layout')

@section('head')
<title>Contact us | Cloudily</title>
<meta name="description" content="Cloudily">
<meta name="keywords" content="Cloudily">

@endsection

@section('content')
 <!--======= Breadcrumb Left With BG Image =======-->
 <section class="overview-block-ptb iq-over-black-70 jarallax iq-breadcrumb3 text-left iq-font-white" style="background-image: url('{{ asset('/images/din-mi.jpg') }}'); background-position: center center; background-repeat: no-repeat; background-size: cover;">
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
                        <li class="breadcrumb-item"><a href="{{ route('pages.home') }}"><i class="ion-android-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
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
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2479.1218846846064!2d-0.3590454!3d51.5843295!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876134393ae2477%3A0x8db03b54d167b098!2s397%20Pinner%20Rd%2C%20North%20Harrow%2C%20Harrow%20HA1%204HN%2C%20UK!5e0!3m2!1sen!2s!4v1659377564919!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <section class="iq-our-touch overview-block-pb">
        <div class="container">
            <div class="iq-get-in iq-pall-40 white-bg">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 iq-mtb-15">
                        <h4 class="heading-left iq-tw-6 iq-pb-20 iq-mb-20">Get in Touch</h4>
                        <div id="success-message" class="alert {{ session('alert-class', 'alert-info') }} border-0 alert-dismissible" style="display: none">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                            Thank you your request has been submitted successfully!
                        </div>
                        <form action="#" method="post" id="contact-form">
                            @csrf
                            <div class="contact-form">
                                <div class="section-field iq-mt-10">
                                    <input class="require" id="name" type="text" placeholder="Name*" name="name">
                                </div>
                                <div class="section-field iq-mt-10">
                                    <input class="require" id="email" type="email" placeholder="Email*" name="email">
                                </div>
                                <div class="section-field iq-mt-10">
                                    <input class="require" id="phone" type="text" placeholder="Phone*" name="phone">
                                </div>
                                <div class="section-field textarea iq-mt-10">
                                    <textarea id="comment" class="input-message require" placeholder="Comment*" rows="5" name="comment"></textarea>
                                </div>
                                <div class="button pull-right iq-mt-20 d-none" id="loader" style="background: white;
                                padding: 0 70px;">
                                    <img style="width: 42px;" src="{{ asset('images/loader.png') }}" alt="Cloudily" />
                                </div>
                                <button id="submit-form" name="submit" type="submit" value="Send" class="button pull-right iq-mt-20">Send Message</button>
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
                                    <p>397 Pinner Road, Harrow Greater London, United Kingdom, HA1 4HN</p>
                                </div>
                            </div>
                            <div class=".iq-contact-box right media iq-mt-40">
                                <div class="iq-icon left">
                                    <i aria-hidden="true" class="ion-ios-telephone-outline"></i>
                                </div>
                                <div class="contact-box right media-body">
                                    <h5 class="iq-tw-6">Phone</h5>
                                    <span class="lead iq-tw-5">+44(0)7861699453</span>
                                    <div class="iq-mb-0">Mon-Fri 8:00am - 8:00pm</div>
                                </div>
                            </div>
                            <div class=".iq-contact-box right media iq-mt-40">
                                <div class="iq-icon left">
                                    <i aria-hidden="true" class="ion-ios-email-outline"></i>
                                </div>
                                <div class="contact-box right media-body">
                                    <h5 class="iq-tw-6">Mail</h5>
                                    <span class="lead iq-tw-5"><a href="mailto:info@cloudily.uk">info@cloudily.uk</a></span>
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
@push('scripts')
    <script>
        $('#contact-form').on('submit', function(e) {
            e.preventDefault();
            $('#loader').removeClass('d-none')
            $('#loader').addClass('d-inline-block')
            $('#submit-form').removeClass('d-inline-block')
            $('#submit-form').addClass('d-none')
            var name = $('#name').val();
            var phone = $('#phone').val();
            var email = $('#email').val();
            var comment = $('#comment').val();
            var token = "{{ csrf_token() }}";
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': token
                },
                method: 'POST',
                url: "/contact/form-submit",
                data:{
                    name:name,
                    phone: phone,
                    email: email,
                    comment: comment
                },
                dataType: 'json',
                success:function(data){
                    if(!data.error)
                    {
                        $('#loader').addClass('d-none')
                        $('#loader').removeClass('d-inline-block')
                        $('#submit-form').addClass('d-inline-block')
                        $('#submit-form').removeClass('d-none')
                        $('#success-message').attr('style', 'display:block');
                    }
                }
            });
        })
    </script>
@endpush