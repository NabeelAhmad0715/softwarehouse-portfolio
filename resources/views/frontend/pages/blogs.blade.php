@extends('frontend.layouts.layout')

@section('head')
<title>Blogs | Cloudily</title>
<meta name="description" content="Cloudily">
<meta name="keywords" content="Cloudily">

@endsection

@section('content')
 <!--======= Breadcrumb Left With BG Image =======-->
 <section class="overview-block-ptb iq-over-black-70 jarallax iq-breadcrumb3 text-left iq-font-white" style="background-image: url('{{ asset('/images/blogging-2620148_1920.jpg') }}'); background-position: center center; background-repeat: no-repeat; background-size: cover;">
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
                        <li class="breadcrumb-item"><a href="{{ route('pages.home') }}"><i class="ion-android-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!--======= Breadcrumb Left With BG Image =======-->
@if (count($blogs))
    <div class="main-content">
        <section class="iq-blog overview-block-ptb">
            <div class="container">
                <div class="row">
                    @foreach ($blogs as $blog)
                        <div class="col-lg-4 col-md-6 iq-mt-20">
                            <div class="iq-blog-entry white-bg">
                                <div class="iq-entry-image clearfix">
                                    <img style="height:200px;width:350px" class="img-fluid" src="{{ asset('/storage/' . $blog->featured_image) }}" alt="#">
                                    <span class="tag"><i class="ion-image"></i> {{ $blog->location }}</span>
                                    <span class="date">{{ $blog->published_date->format('d') }}<small>{{ $blog->published_date->format('F') }}</small></span>
                                </div>
                                <div class="iq-blog-detail" style="height: 250px">
                                    <div class="iq-entry-title iq-mb-10">
                                        <a href="{{ route('pages.blog-details', $blog->slug) }}">
                                            <h5 class="iq-tw-6">{{ $blog->title }}</h5>
                                        </a>
                                    </div>
                                    <div class="iq-entry-content">
                                        {!! Str::words($blog->description,30) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endif
@endsection
