@extends('layouts.admin.app')
@section('title', 'Authors')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="fw-bold py-3 mb-4">
            <span class="text-dark fw-bold">Manage Authors</span>
        </h4>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="card">
            <h5 class="card-header">Authors List</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact No</th>
                            <th class="text-center">Verified</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse($authors as $author)
                            <tr>
                                <td>{{ $author->full_name }}</td>
                                <td>{{ $author->email }}</td>
                                <td>{{ $author->contact_no }}</td>

                                <td class="text-center">
                                    @if ($author->is_verified == 1)
                                        <span class="badge bg-label-success">Verified</span>
                                    @else
                                        <span class="badge bg-label-warning">Pending</span>
                                    @endif
                                </td>

                                <td class="text-center">
                                    @if ($author->is_block == 1)
                                        <span class="badge bg-label-danger">Block</span>
                                    @else
                                        <span class="badge bg-label-success">Unblock</span>
                                    @endif
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
