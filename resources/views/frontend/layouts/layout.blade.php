<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @yield('head')
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="Cloudily" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

   <!-- Favicon -->
   <link rel="shortcut icon" href="{{ asset('images/loader.png')}}" />
   <!-- bootstrap -->
   <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
   <!-- font awesome -->
   <link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
   <!-- ionicons icon -->
   <link href="{{ asset('css/ionicons.min.css')}}" rel="stylesheet" type="text/css" />
   <!-- mega menu -->
   <link href="{{ asset('css/mega-menu/mega_menu.css')}}" rel="stylesheet" type="text/css" />
   <!-- owl-carousel -->
   <link href="{{ asset('css/owl-carousel/owl.carousel.css')}}" rel="stylesheet" type="text/css" />
   <!-- magnific popup -->
   <link href="{{ asset('css/magnific-popup.css')}}" rel="stylesheet" type="text/css" />
   <!-- animate -->
   <link href="{{ asset('css/animate.css')}}" rel="stylesheet" type="text/css" />
   <!-- media element player -->
   <link href="{{ asset('css/mediaelementplayer.min.css')}}" rel="stylesheet" type="text/css" />
   <!-- shortcodes -->
   <link href="{{ asset('css/shortcodes.css')}}" rel="stylesheet" type="text/css" />
   <!-- main style -->
   <link href="{{ asset('css/style.css')}}" rel="stylesheet" type="text/css" />
   <!-- shop -->
   <link href="{{ asset('css/shop.css')}}" rel="stylesheet" type="text/css" />
   <!-- responsive -->
   <link href="{{ asset('css/responsive.css')}}" rel="stylesheet" type="text/css" />
   <!-- custom -->
   <link href="{{ asset('css/custom.css')}}" rel="stylesheet" type="text/css" />
   <style>
    .text-transform{
        text-transform: capitalize;
    }
    .iq-blog-entry{
        box-shadow: 0px 0px 30px rgb(0 0 0 / 10%);
    }
   </style>
</head>

<body>
        <div id="loading">
            <div id="loading-center">
                <img src="{{ asset('images/loader.png') }}" alt="loder">
            </div>
        </div>
        @include('frontend.partials.header')
            @yield('content')
        @include('frontend.partials.footer')
    <!-- back-to-top -->
    <div id="back-to-top">
        <a class="top" id="top" href="#top"> <i class="ion-ios-upload-outline"></i> </a>
    </div>
    <!-- back-to-top End -->
    
    <!--================ Jquery =================-->
    <!-- Jquery  -->
    <script src="{{ asset('js/jquery.min.js')}}"></script>

    <!-- bootstrap -->
    <script src="{{ asset('js/popper.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>

    <!-- Mega Menu -->
    <script src="{{ asset('js/mega-menu/mega_menu.js')}}"></script>
    <!-- Main -->
    <script src="{{ asset('js/main.js')}}"></script>
  
    <!-- Custom -->
    <script src="{{ asset('js/custom.js')}}"></script>
    <script>
        $('#hello-form').on('submit', function(e) {
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
    @stack('scripts')
</body>

</html>
