    <!--================Header Menu Area =================-->
    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container box_1620">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.html"><img src="{{ asset('theme') }}/img/logo.png"
                            alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav justify-content-center">
                            <li class="nav-item @yield('home')"><a class="nav-link"
                                    href="{{ route('theme.index') }}">Home</a></li>
                            <li class="nav-item submenu dropdown @yield('categories')">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Categories</a>
                                <ul class="dropdown-menu">
                                    @foreach ($categories as $index => $category)
                                        <li class="nav-item">
                                            <a class="nav-link"
                                                href="{{ route('theme.category', $index) }}">{{ $category }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item @yield('contact-us')"><a class="nav-link"
                                    href="{{ route('theme.contact-us') }}">Contact</a></li>
                        </ul>
                        @auth
                            <!-- Add new blog -->
                            <a href="{{ route('blog.create') }}" class="btn btn-sm btn-primary mr-2">Add New</a>
                            <!-- End - Add new blog -->
                        @endauth

                        <ul class="nav navbar-nav navbar-right navbar-social">
                            @guest
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="btn btn-sm btn-warning">Register / Login</a>
                                </li>
                            @else
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle " data-toggle="dropdown">Welcome
                                        {{ Auth::user()->name }}</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('blog.my-blog') }}">My Blogs</a>
                                        </li>
                                        <li class="nav-item">
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <a class="nav-link" href=""
                                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                                    Logout
                                                </a>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Menu Area =================-->
