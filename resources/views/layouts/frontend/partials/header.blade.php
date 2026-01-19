    <div class="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <ul class="left-info">
                        <li><a href="#"><i class="fa fa-envelope"></i>contact@company.com</a></li>
                        <li><a href="#"><i class="fa fa-phone"></i>123-456-7890</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="right-icons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <h2>Blog <em> Management System</em></h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('home') }}">
                                Home
                                @if (request()->routeIs('home'))
                                    <span class="sr-only">(current)</span>
                                @endif
                            </a>
                        </li>

                        <li class="nav-item {{ request()->routeIs('blogs*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('blogs') }}">
                                Blogs
                                @if (request()->routeIs('blogs*'))
                                    <span class="sr-only">(current)</span>
                                @endif
                            </a>
                        </li>

                        <li class="nav-item {{ request()->routeIs('about-us') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('about-us') }}">
                                About Us
                                @if (request()->routeIs('about-us'))
                                    <span class="sr-only">(current)</span>
                                @endif
                            </a>
                        </li>

                        <li class="nav-item {{ request()->routeIs('contact-us') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('contact-us') }}">
                                Contact Us
                                @if (request()->routeIs('contact-us'))
                                    <span class="sr-only">(current)</span>
                                @endif
                            </a>
                        </li>

                        <li class="nav-item {{ request()->routeIs('authors') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('authors') }}">
                                Authors
                                @if (request()->routeIs('authors'))
                                    <span class="sr-only">(current)</span>
                                @endif
                            </a>
                        </li>
                        @guest


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="registerDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Register
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="registerDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('register') }}">User</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('author.register') }}">Author</a>
                                    </li>
                                </ul>
                            </li>


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="loginDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Login
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="loginDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('login') }}">User</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('author.login') }}">Author</a>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->full_name }}
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">


                                    @if (Auth::user()->role === 'admin')
                                        <li>
                                            <a class="dropdown-item" href="{{ route('admin.index') }}">
                                                Dashboard
                                            </a>
                                        </li>
                                    @elseif (Auth::user()->role === 'author')
                                        <li>
                                            <a class="dropdown-item" href="{{ route('author.index') }}">
                                                Dashboard
                                            </a>
                                        </li>
                                    @endif

                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>


                                    <li>
                                        @if (Auth::user()->role === 'admin')
                                            <form action="{{ route('admin.logout') }}" method="POST">
                                            @elseif (Auth::user()->role === 'author')
                                                <form action="{{ route('author.logout') }}" method="POST">
                                                @else
                                                    <form action="{{ route('logout') }}" method="POST">
                                        @endif
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            Logout
                                        </button>
                                        </form>
                                    </li>

                                </ul>
                            </li>

                        @endguest



                    </ul>
                </div>
            </div>
        </nav>
    </header>
