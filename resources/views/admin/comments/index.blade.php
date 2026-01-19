@extends('layouts.admin.app')
@section('title', 'Comments')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="fw-bold py-3 mb-4">
            <span class="text-dark fw-bold">Manage Comments</span>
        </h4>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif




        <div class="card">
            <h5 class="card-header">Comments List</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Post Title</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Comment</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($comments as $comment)
                            <tr>
                                <td>{{ Str::limit($comment->post->title, 20) }}</td>
                                <td>{{ $comment->name }}</td>
                                <td>{{ $comment->email }}</td>
                                <td class="text-wrap">
                                    {{ Str::limit($comment->comment, 200) }}
                                </td>
                                <td class="text-center">
                                    @if ($comment->status == 'approved')
                                        <span class="badge bg-label-success me-1">Approved</span>
                                    @elseif ($comment->status == 'rejected')
                                        <span class="badge bg-label-danger me-1">Rejected</span>
                                    @else
                                        <span class="badge bg-label-warning me-1">Pending</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>

                                        <div class="dropdown-menu">

                                            <form action="{{ route('admin.comments.approve', $comment->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure you want to approve?');">
                                                @csrf
                                                <button type="submit" class="dropdown-item text-success">
                                                    <i class="bx bx-check-circle me-1"></i> Approve
                                                </button>
                                            </form>


                                            <form action="{{ route('admin.comments.reject', $comment->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to reject?');">
                                                @csrf
                                                <button type="submit" class="dropdown-item text-danger">
                                                    <i class="bx bx-x-circle me-1"></i> Reject
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12" class="text-center text-danger">
                                    No comments found
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
