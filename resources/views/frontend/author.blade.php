@extends('layouts.frontend.app')
@section('title', 'Author')

@section('content')

<div class="page-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Authors</h1>
                <span>Our registered professional authors</span>
            </div>
        </div>
    </div>
</div>

<div class="team" style="margin: 0">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Our <em>Authors</em></h2>
                    <span>Meet the people behind our content</span>
                </div>
            </div>

            @forelse ($authors as $author)
                <div class="col-md-4">
                    <div class="team-item">


                        <img src="{{ $author->image_url
                                    ? $author->image_url
                                    : asset('assets/images/team-image-1-646x680.jpg') }}"
                             alt="{{ $author->full_name }}">

                        <div class="down-content">
                            <h4>{{ $author->full_name ?? '' }}</h4>
                            <span>Author</span>



                           
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <p class="text-center text-muted">No authors found.</p>
                </div>
            @endforelse

        </div>
    </div>
</div>

@endsection
