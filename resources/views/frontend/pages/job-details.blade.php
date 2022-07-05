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
    <section class="overview-block-ptb light-tab">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 iq-mtb-10">
                    <h4 class="small-title iq-tw-6">Best Services Qwilo</h4>
                    <ul class="nav nav-pills iq-mt-40" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="retina-tab" data-toggle="pill" href="#retina" role="tab" aria-controls="retina" aria-selected="true">Retina Ready</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="updates-tab" data-toggle="pill" href="#updates" role="tab" aria-controls="updates" aria-selected="false">Free Updates</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="useful-tab" data-toggle="pill" href="#useful" role="tab" aria-controls="useful" aria-selected="false">Useful Sections</a>
                        </li>
                    </ul>
                    <div class="tab-content iq-mt-20" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="retina" role="tabpanel" aria-labelledby="retina-tab">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>
                        <div class="tab-pane fade" id="updates" role="tabpanel" aria-labelledby="updates-tab">Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>
                        <div class="tab-pane fade" id="useful" role="tabpanel" aria-labelledby="useful-tab">Simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <form class="iq-form2">
                        <h6>Welcome!</h6>
                        <h3 class="iq-tw-7">Log in Here</h3>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-uppercase">User id</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email  Address">
                            <i class="ion-ios-person"></i>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="text-uppercase">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            <i class="ion-ios-unlocked"></i>
                        </div>
                        <div class="remember-checkbox iq-pt-10">
                            <input type="checkbox" name="one" id="one">
                            <label class="remember" for="one">Remember me</label>
                        </div>
                        <a href="#" class="button text-center iq-mt-30">Submit</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
