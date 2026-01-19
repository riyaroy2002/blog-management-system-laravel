@extends('layouts.admin.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 col-md-12 order-1">

                <div class="row">

                    
                    <div class="col-lg-3 col-md-6 col-12 mb-4">
                        <div class="card shadow-md bg-white border border-danger mb-3">
                            <div class="card-body">
                                <span class="fw-semibold d-block mb-1">Total Authors</span>
                                <h3 class="card-title mb-2">{{ $totalAuthors }}</h3>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-6 col-12 mb-4">
                        <div class="card shadow-md bg-white border border-danger mb-3">
                            <div class="card-body">
                                <span class="fw-semibold d-block mb-1">Total Users</span>
                                <h3 class="card-title mb-2">{{ $totalUsers }}</h3>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-6 col-12 mb-4">
                        <div class="card shadow-md bg-white border border-danger mb-3">
                            <div class="card-body">
                                <span class="fw-semibold d-block mb-1">Total Posts</span>
                                <h3 class="card-title mb-2">{{ $totalPosts }}</h3>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-6 col-12 mb-4">
                        <div class="card shadow-md bg-white border border-danger mb-3">
                            <div class="card-body">
                                <span class="fw-semibold d-block mb-1">Total Pending Comments</span>
                                <h3 class="card-title mb-2">{{ $pendingComments }}</h3>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-6 col-12 mb-4">
                        <div class="card shadow-md bg-white border border-danger mb-3">
                            <div class="card-body">
                                <span class="fw-semibold d-block mb-1">Total Approved Comments</span>
                                <h3 class="card-title mb-2">{{ $approvedComments }}</h3>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
