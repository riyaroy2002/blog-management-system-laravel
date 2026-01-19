    @extends('layouts.frontend.app')
    @section('title', 'Blog-Details')
    @section('content')

        <div class="page-heading header-text">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>{{ $post->title }}</h1>
                        <span>
                            <i class="fa fa-user"></i>
                            {{ $post->user->full_name ?? '' }}
                            &nbsp;|&nbsp;
                            <i class="fa fa-calendar"></i>
                            {{ $post->created_at->format('d.m.Y H:i A') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="more-info about-info">
            <div class="container">
                <div class="more-info-content">
                    <div class="right-content">

                        @if ($post->image)
                            <div>
                                <img src="{{ $post->image_url }}" class="img-fluid" alt="{{ $post->title }}">
                            </div>
                            <br>
                        @endif
                        <h1>{{ $post->title }}</h1>
                        <span class="text-muted">
                            {{ Str::limit(strip_tags($post->text_content), 300) }}
                        </span>

                    </div>
                </div>
            </div>

        </div>


        <div class="callback-form contact-us">
            <div class="container">
                <div class="row mt-5">


                    <div class="col-lg-6 col-md-12">
                        <h4 class="mb-4">Comments ({{ $post->comments->count() }})</h4>

                        @forelse ($post->comments as $comment)
                            <div class="comment mb-3 p-3 bg-light rounded shadow-sm">
                                <h5 class="mb-1">
                                    {{ $comment->user->full_name ?? $comment->name }}
                                </h5>
                                <small class="text-muted d-block mb-2">
                                    {{ $comment->created_at->format('d M Y, h:i A') }}
                                </small>
                                <p class="mb-0"><em>"{{ $comment->comment }}"</em></p>
                            </div>
                        @empty
                            <p class="text-muted">No comments yet. Be the first to comment!</p>
                        @endforelse
                    </div>


                    <div class="col-lg-6 col-md-12">
                        <div class="contact-form">
                            <h4 class="mb-4">Leave a Comment</h4>

                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    {{ session('success') }}
                                </div>
                            @endif


                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show">
                                    {{ session('error') }}
                                </div>
                            @endif


                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>

                                </div>
                            @endif

                            <form id="contact" action="{{ route('comment.store', $post->id) }}" method="POST">
                                @csrf

                                <div class="row">


                                    <div class="col-md-12">
                                        <fieldset>
                                            <input type="text" name="name" placeholder="Full Name*"
                                                value="{{ auth()->check() ? auth()->user()->full_name : old('name') }}"
                                                {{ auth()->check() ? 'readonly' : '' }}
                                                class="@error('name') is-invalid @enderror">
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </fieldset>
                                    </div>

                              
                                    <div class="col-md-12">
                                        <fieldset>
                                            <input type="email" name="email" placeholder="Your Email*"
                                                value="{{ auth()->check() ? auth()->user()->email : old('email') }}"
                                                {{ auth()->check() ? 'readonly' : '' }}
                                                class="@error('email') is-invalid @enderror">
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </fieldset>
                                    </div>


                                    <div class="col-lg-12">
                                        <fieldset>
                                            <textarea name="comment" rows="6" placeholder="Write your comment..."
                                                class="@error('comment') is-invalid @enderror">{{ old('comment') }}</textarea>
                                            @error('comment')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </fieldset>
                                    </div>


                                    <div class="col-lg-12">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="filled-button">
                                                Submit Comment
                                            </button>
                                        </fieldset>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    @endsection
