<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li>
                    <a class="{{ (request()->routeIs('admin.pages.home')) ? 'active' : '' }}" href="{{ route('admin.pages.home') }}">
                        <i class="fe fe-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="submenu" >
                    <a href="#" class="{{ (request()->routeIs('careers.*')) ? 'active' : '' }}" >
                        <i class="fas fa-project-diagram" style='font-size:19px'></i>
                        <span>Careers</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li><a class="{{ (request()->routeIs('careers.create')) ? 'active' : '' }}" href="{{ route('careers.create') }}">Add A New Career</a></li>
                        <li><a class="{{ (request()->routeIs('careers.index')) ? 'active' : '' }}" href="{{ route('careers.index') }}">View All Careers</a></li>
                    </ul>
                </li>
                <li class="submenu" >
                    <a href="#" class="{{ (request()->routeIs('portfolio.*')) ? 'active' : '' }}" >
                        <i class="fas fa-project-diagram" style='font-size:19px'></i>
                        <span>Portfolio</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li><a class="{{ (request()->routeIs('portfolio.create')) ? 'active' : '' }}" href="{{ route('portfolio.create') }}">Add A New Portfolio</a></li>
                        <li><a class="{{ (request()->routeIs('portfolio.index')) ? 'active' : '' }}" href="{{ route('portfolio.index') }}">View All Portfolio</a></li>
                    </ul>
                </li>
                <li class="submenu" >
                    <a href="#" class="{{ (request()->routeIs('latest-news.*')) ? 'active' : '' }}" >
                        <i class="fas fa-project-diagram" style='font-size:19px'></i>
                        <span>Latest News</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li><a class="{{ (request()->routeIs('latest-news.create')) ? 'active' : '' }}" href="{{ route('latest-news.create') }}">Add A New Latest News</a></li>
                        <li><a class="{{ (request()->routeIs('latest-news.index')) ? 'active' : '' }}" href="{{ route('latest-news.index') }}">View All Latest News</a></li>
                    </ul>
                </li>
                <li class="submenu" >
                    <a href="#" class="{{ (request()->routeIs('blogs.*')) ? 'active' : '' }} {{ (request()->routeIs('sections.*')) ? 'active' : '' }}" >
                        <i class="fas fa-project-diagram" style='font-size:19px'></i>
                        <span>Blogs</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li><a class="{{ (request()->routeIs('blogs.create')) ? 'active' : '' }}" href="{{ route('blogs.create') }}">Add A New Blog</a></li>
                        <li><a class="{{ (request()->routeIs('blogs.index')) ? 'active' : '' }}" href="{{ route('blogs.index') }}">View All Blogs</a></li>
                    </ul>
                </li>
                <li class="submenu" >
                    <a href="#" class="{{ (request()->routeIs('services.*')) ? 'active' : '' }}" >
                        <i class="fas fa-project-diagram" style='font-size:19px'></i>
                        <span>Services</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li><a class="{{ (request()->routeIs('services.create')) ? 'active' : '' }}" href="{{ route('services.create') }}">Add A New Service</a></li>
                        <li><a class="{{ (request()->routeIs('services.index')) ? 'active' : '' }}" href="{{ route('services.index') }}">View All Services</a></li>
                    </ul>
                </li>
                <li class="submenu" >
                    <a href="#" class="{{ (request()->routeIs('testimonials.*')) ? 'active' : '' }}" >
                        <i class="fas fa-project-diagram" style='font-size:19px'></i>
                        <span>Testimonials</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li><a class="{{ (request()->routeIs('testimonials.create')) ? 'active' : '' }}" href="{{ route('testimonials.create') }}">Add A New Testimonial</a></li>
                        <li><a class="{{ (request()->routeIs('testimonials.index')) ? 'active' : '' }}" href="{{ route('testimonials.index') }}">View All Testimonials</a></li>
                    </ul>
                </li>
                {{-- <li>
                    <a class="{{ (request()->routeIs('general-settings.*')) ? 'active' : '' }}" href="{{ route('general-settings.edit',[1]) }}">
                        <i class="fe fe-vector"></i>
                        <span>General Settings</span>
                    </a>
                </li> --}}
                <li>
                    <a class="{{ (request()->routeIs('admin.change-password.*')) ? 'active' : '' }}" href="{{ route('admin.change-password.edit') }}">
                        <i class="fe fe-lock"></i>
                        <span>Change Password</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('admin-logout').submit();">
                        <i class="fe fe-lock"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
            <form id="admin-logout" action="{{ route('admin.logout') }}" method = "POST" style="display: none;">@csrf</form>
        </div>
    </div>
</div>
