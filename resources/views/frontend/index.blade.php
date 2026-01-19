    @extends('layouts.frontend.app')
    @section('title', 'Home')
    @section('content')

        <div class="main-banner header-text" id="top">
            <div class="Modern-Slider">

                <div class="item item-1">
                    <div class="img-fill">
                        <div class="text-content">
                            <h6>lorem ipsum dolor sit amet!</h6>
                            <h4>Quam temporibus accusam <br> hic ducimus quia</h4>
                            <p>Magni deserunt dolorem consectetur adipisicing elit. Corporis molestiae optio, laudantium
                                odio quod rerum maiores, omnis unde quae illo.</p>
                            <a href="{{ route('blogs') }}" class="filled-button">Read More</a>
                        </div>
                    </div>
                </div>

                <div class="item item-2">
                    <div class="img-fill">
                        <div class="text-content">
                            <h6>magni deserunt dolorem harum quas!</h6>
                            <h4>Aliquam iusto harum <br> ratione porro odio</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At culpa cupiditate mollitia
                                adipisci assumenda laborum eius quae quo excepturi, eveniet. Dicta nulla ea beatae
                                consequuntur?</p>
                            <a href="{{ route('about-us') }}" class="filled-button">About Us</a>
                        </div>
                    </div>
                </div>

                <div class="item item-3">
                    <div class="img-fill">
                        <div class="text-content">
                            <h6>alias officia qui quae vitae natus!</h6>
                            <h4>Lorem ipsum dolor <br>sit amet, consectetur.</h4>
                            <p>Vivamus ut tellus mi. Nulla nec cursus elit, id vulputate mi. Sed nec cursus augue. Phasellus
                                lacinia ac sapien vitae dapibus. Mauris ut dapibus velit cras interdum nisl ac urna tempor
                                mollis.</p>
                            <a href="{{ route('contact-us') }}" class="filled-button">Contact Us</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="more-info">
            <div class="container">
                <div class="row" id="tabs">

                    @if ($latestBlogs->count() || $featuredBlog)


                        <div class="col-md-4">
                            <ul>
                                @foreach ($latestBlogs as $index => $blog)
                                    <li>
                                        <a href="#tabs-{{ $index + 1 }}">
                                            {{ Str::limit($blog->title, 45) }} <br>
                                            <small>
                                                {{ $blog->author->full_name ?? '' }}
                                                &nbsp;|&nbsp;
                                                {{ $blog->created_at->format('d.m.Y H:i') }}
                                            </small>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                            <br>

                            <div class="text-center">
                                <a href="{{ route('blogs') }}" class="filled-button">
                                    Read More
                                </a>
                            </div>
                        </div>


                        <div class="col-md-8">
                            <section class="tabs-content">

                                @if ($featuredBlog)
                                    <article id="tabs-1">
                                        <img src="{{ $featuredBlog->image_url }}" class="img-fluid"
                                            alt="{{ $featuredBlog->title }}">

                                        <h4 class="mt-3">
                                            <a href="{{ route('blog-details', $featuredBlog->slug) }}">
                                                {{ $featuredBlog->title }}
                                            </a>
                                        </h4>

                                        <p>
                                            {{ Str::limit(strip_tags($featuredBlog->content), 300) }}
                                        </p>
                                    </article>
                                @endif

                            </section>
                        </div>
                    @else

                        <div class="col-12 text-center py-5">
                            <h4 class="text-muted">NO BLOGS FOUND</h4>

                        </div>
                    @endif

                </div>
            </div>
        </div>


        <div class="fun-facts">
            <div class="container">
                <div class="more-info-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="left-image">
                                <img src="{{ asset('assets/images/about-1-570x350.jpg') }}" class="img-fluid"
                                    alt="">
                            </div>
                        </div>
                        <div class="col-md-6 align-self-center">
                            <div class="right-content">
                                <span>Who we are</span>
                                <h2>Get to know <em>about us</em></h2>
                                <p>Curabitur pulvinar sem a leo tempus facilisis. Sed non sagittis neque. Nulla conse quat
                                    tellus nibh, id molestie felis sagittis ut. Nam ullamcorper tempus ipsum in cursus</p>
                                <a href="{{ route('about-us') }}" class="filled-button">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
