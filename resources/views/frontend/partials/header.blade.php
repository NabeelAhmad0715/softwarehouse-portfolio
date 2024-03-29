<header class="header-01 white re-none">
    <!-- menu start -->
    <nav id="menu-1" class="mega-menu">
        <!-- menu list items container -->
        <section class="menu-list-items">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- menu links -->
                        <ul class="menu-logo">
                            <li>
                                <a href="{{ route('pages.home') }}">
                                    <img id="logo_img" src="{{ asset('images/sje.png') }}" alt="logo">
                                </a>
                            </li>
                        </ul>
                        <ul class="menu-links">
                            <!-- active class -->

                            <li><a href="{{ route('pages.services') }}">Services <i class="fa fa-angle-right fa-indicator"></i></a>
                                <!-- drop down multilevel  -->
                                <ul class="drop-down-multilevel">
                                    @foreach ($services as $service)
                                        <li><a href="{{ route('pages.service-details', $service->slug) }}">{{ $service->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{ route('pages.jobs') }}">Hire Developers <i class="fa fa-angle-right fa-indicator"></i></a>
                                <!-- drop down multilevel  -->
                                <ul class="drop-down-multilevel">
                                    @foreach ($careers as $career)
                                        <li><a href="{{ route('pages.job-details', $career->slug) }}">{{ $career->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)">Contact Hub <i class="fa fa-angle-right fa-indicator"></i></a>
                                <!-- drop down multilevel  -->
                                <ul class="drop-down-multilevel">
                                    <li><a href="{{ route('pages.latest-news') }}">Latest News</a></li>
                                    <li><a href="{{ route('pages.blogs') }}">Blogs</a></li>

                                </ul>
                            </li>
                            <li><a href="javascript:void(0)">Company <i class="fa fa-angle-right fa-indicator"></i></a>
                                <!-- drop down multilevel  -->
                                <ul class="drop-down-multilevel">
                                    <li><a href="{{ route('pages.about-us') }}">About us</a></li>
                                    <li><a href="{{ route('pages.portfolio') }}">Portfolio</a></li>
                                </ul>
                            </li>
                            <li class="active"><a href="{{ route('pages.contact-us') }}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </nav>
</header> 