@extends('layouts.frontend.app')
@section('title', 'Blogs')
@section('content')

<div class="page-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Read our Blog</h1>
                <span>Lorem ipsum dolor sit amet consectetur</span>
            </div>
        </div>
    </div>
</div>

<div class="single-services">
    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <section class="tabs-content">

                    @forelse ($posts as $post)
                        <article>
                            <img src="{{ $post->image_url }}"
                                 class="img-fluid"
                                 alt="{{ $post->title }}">
                            <h4>
                                <a href="{{ route('blog-details', $post->slug) }}">
                                    {{ $post->title }}
                                </a>
                            </h4>

                            <div style="margin-bottom:10px;">
                                <span>
                                    {{ $post->user->full_name ?? '' }}
                                    &nbsp;|&nbsp;
                                    {{ $post->created_at->format('d.m.Y H:i') }}
                                    &nbsp;|&nbsp;
                                    {{ $post->comments->count() }} comments
                                </span>
                            </div>

                            <p>
                                {{ Str::limit(strip_tags($post->text_content), 250) }}
                            </p>

                            <br>

                            <div>
                                <a href="{{ route('blog-details', $post->slug) }}"
                                   class="filled-button">
                                    Continue Reading
                                </a>
                            </div>
                        </article>

                        <br><br><br>

                    @empty
                        <div class="text-center py-5">
                            <h4 class="text-muted">NO BLOGS FOUND</h4>

                        </div>
                    @endforelse

                </section>
            </div>

            <div class="col-md-4">
                <h4 class="h4">Recent posts</h4>
                @if ($recentPosts->count())
                    <ul>
                        @foreach ($recentPosts as $recent)
                            <li>
                                <h5 style="margin-bottom:10px;">
                                    <a href="{{ route('blog-details', $recent->slug) }}">
                                        {{ Str::limit($recent->title, 55) }}
                                    </a>
                                </h5>
                                <small>
                                    <i class="fa fa-user"></i>
                                    {{ $recent->user->full_name ?? 'Admin' }}
                                    &nbsp;|&nbsp;
                                    <i class="fa fa-calendar"></i>
                                    {{ $recent->created_at->format('d.m.Y H:i') }}
                                </small>
                            </li>
                            <li><br></li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted">No recent posts</p>
                @endif
            </div>
        </div>
    </div>
</div>
<br>
@endsection
