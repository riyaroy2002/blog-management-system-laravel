@extends('layouts.author.app')
@section('title', 'Posts List')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-dark fw-bold">Manage Posts</span>
        </h4>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('author.post.create') }}" class="btn btn-danger">
                <i class="bx bx-plus"></i> Add Post
            </a>
        </div>

        <div class="card">
            <h5 class="card-header">Post List</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Text Content</th>
                            <th>Image</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse($posts as $item)
                            <tr>
                                <td>{{ Str::limit($item->title, 20) }}</td>
                                <td>{{ Str::limit($item->slug, 20) }}</td>
                                <td>{{ Str::limit($item->text_content, 20) }}</td>
                                <td><img src="{{ $item->image_url }}" alt="Post Image" class="img-fluid mt-2"
                                        style="max-height: 40px;"></td>

                                <td class="text-center">
                                    @if ($item->status == 'draft')
                                        <span class="badge bg-label-warning me-1">Draft</span>
                                    @else
                                        <span class="badge bg-label-success me-1">Published</span>
                                    @endif
                                </td>

                                <td class="text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('author.post.edit', $item->id) }}">
                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                            </a>
                                            <form action="{{ route('author.post.delete', $item->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this post?');">
                                                @csrf
                                                
                                                <button type="submit" class="dropdown-item text-danger">
                                                    <i class="bx bx-trash-alt me-1"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12" class="text-center text-danger">
                                    <i class="bx bx-error-circle me-2"></i> No Data Found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <hr class="my-5" />
    </div>
@endsection
