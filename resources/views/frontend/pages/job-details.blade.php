@extends('frontend.layouts.layout')

@section('head')
<title>Jobs | {{ $career->title }} | Cloudily</title>
<meta name="description" content="Cloudily">
<meta name="keywords" content="Cloudily">

@endsection

@section('content')
 <!--======= Breadcrumb Left With BG Image =======-->
 <section class="overview-block-ptb iq-over-black-70 jarallax iq-breadcrumb3 text-left iq-font-white" style="background-image: url('{{ asset('/images/job-4131482_1920.jpg') }}'); background-position: center center; background-repeat: no-repeat; background-size: cover;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="iq-mb-0">
                    <h2 class="iq-font-white iq-tw-6">Jobs | {{ $career->title }}</h2>
                </div>
            </div>
            <div class="col-lg-4">
                <nav aria-label="breadcrumb" class="text-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('pages.home') }}"><i class="ion-android-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Jobs > {{ $career->title }}</li>
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
                    <h4 class="small-title iq-tw-6">{{ $career->title }}</h4>
                    <button class="button iq-mt-15">{{ $career->location }}</button> <button class="button iq-mt-15">{{ $career->job_type }}</button> <button class="button iq-mt-15">{{ $career->job_category }}</button>

                    <div class="tab-content iq-mt-20">
                        {!! $career->description !!}
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 iq-mtb-10">
                    @include('common.partials.flash')
                    <form method="POST" action="{{ route('pages.careers-job-apply', $career->slug) }}" class="iq-form2" enctype="multipart/form-data" style="top:0;position:inherit">
                        @csrf
                        <h6>Upload your proposal!</h6>
                        <div class="form-group">
                            <label for="name" class="text-uppercase">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Fullname">
                            <i class="ion-ios-person"></i>
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-uppercase">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email Address">
                            <i class="ion-ios-email"></i>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="text-uppercase">Phone</label>
                            <input type="tel" class="form-control" name="phone" placeholder="Phone No.">
                            <i class="ion-ios-telephone"></i>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="text-uppercase">Upload proposal</label>
                            <input type="file" name="cv">
                        </div>
                        <button type="submit" class="button text-center iq-mt-30">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection