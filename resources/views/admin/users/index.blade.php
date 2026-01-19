@extends('layouts.admin.app')
@section('title', 'Users')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="fw-bold py-3 mb-4">
            <span class="text-dark fw-bold">Manage Users</span>
        </h4>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="card">
            <h5 class="card-header">Users List</h5>
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
                        @forelse($users as $user)
                            <tr>
                                <td>{{ $user->full_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->contact_no }}</td>

                                <td class="text-center">
                                    @if ($user->is_verified == 1)
                                        <span class="badge bg-label-success">Verified</span>
                                    @else
                                        <span class="badge bg-label-warning">Pending</span>
                                    @endif
                                </td>

                                <td class="fw-semibold text-center">
                                    <button type="button" class="border-0 bg-transparent p-0"
                                        title="Click to toggle status" data-bs-toggle="modal"
                                        data-bs-target="#delUsr{{ $user->id }}">
                                        <span class="badge bg-label-{{ $user->is_block ? 'danger' : 'success' }}">
                                            {{ $user->is_block ? 'Blocked' : 'Unblocked' }}
                                        </span>
                                    </button>

                                    <div class="modal fade" id="delUsr{{ $user->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Block / Unblock User</h5>

                                                </div>

                                                <div class="modal-body">
                                                    Are you sure you want to
                                                    {{ $user->is_block ? 'unblock' : 'block' }} this user?
                                                </div>

                                                <div class="modal-footer">
                                                    <button class="btn btn-dark" data-bs-dismiss="modal">
                                                        Cancel
                                                    </button>

                                                    <form method="POST"
                                                        action="{{ route('admin.users.toggle-block', $user->id) }}">
                                                        @csrf
                                                        <button class="btn btn-danger" type="submit">
                                                            Yes
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
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
