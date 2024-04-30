@extends('layouts.app')
<style>
    body {
        background-color: #fbfbfb;
    }

    @media (min-width: 991.98px) {
        main {
            padding-left: 240px;
        }
    }

    /* Sidebar */
    .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        padding: 58px 0 0;
        /* Height of navbar */
        box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
        width: 240px;
        z-index: 600;
    }

    @media (max-width: 991.98px) {
        .sidebar {
            width: 100%;
        }
    }

    .sidebar .active {
        border-radius: 5px;
        box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
    }

    .sidebar-sticky {
        position: relative;
        top: 0;
        height: calc(100vh - 48px);
        padding-top: 0.5rem;
        overflow-x: hidden;
        overflow-y: auto;
        /* Scrollable contents if viewport is shorter than content. */
    }

    .custom-card {
        border-left: 5px solid pink;
        transition: border-color 0.3s ease;
        /* Smooth transition effect */
    }

    .custom-card:hover {
        border-color: blue;
        /* Change border color on hover */
    }
</style>
@section('content')
    <!--Main Navigation-->
    <header>
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
            <div class="position-sticky">
                <div class="list-group list-group-flush mx-3 mt-4">

                    <a href="#" class="list-group-item list-group-item-action py-2 ripple active">
                        <i class="fas fa-chart-area fa-fw me-3"></i><span>Webiste traffic</span>
                    </a>

                    <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                            class="fas fa-users fa-fw me-3"></i><span>Users</span></a>
                    <a href="{{ route('leave.request') }}" class="list-group-item list-group-item-action py-2 ripple"><i
                            class="fas fa-money-bill fa-fw me-3" id="requestManageLink"></i><span>Leave Manage</span></a>
                </div>
            </div>
        </nav>
        <!-- Sidebar -->
        <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
            <div class="container-fluid">
                <!-- Navbar brand/logo -->
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('images/logo.png') }}" height="30" alt="Logo">
                </a>
                <!-- Navbar toggle button for small screens -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Navbar links and user information -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">

                        <!-- User information -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('images/user.png') }}" class="rounded-circle" height="30">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li>
                                    <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <a class="dropdown-item" href="#"
                                            onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">Logout</a>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <!-- End of User information -->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navbar -->

        <!-- Navbar -->
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main style="margin-top: 80px;">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                    <div class="card card-plain h-100 bg-white">
                        <div style="border-left: 5px solid rgba(7, 241, 191, 0.388);"class="p-3">
                            <div class="row">
                                <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                    <div>
                                        <h5 class="mb-0 text-capitalize font-weight-bold">
                                            $ <span id="total">
                                                {{ $totalLeaveRequests }}
                                            </span>
                                        </h5>
                                        <p class="mb-0 text-sm">Total Sale</p>
                                    </div>
                                </div>
                                <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                        <img class="w-100 " src="{{ asset('images/icon.svg') }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                    <div class="card card-plain h-100 bg-white">
                        <div style="border-left: 5px solid rgba(7, 241, 191, 0.388);"class="p-3">
                            <div class="row">
                                <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                    <div>
                                        <h5 class="mb-0 text-capitalize font-weight-bold">
                                            $ <span id="total">
                                                {{ $approvedRequests }}
                                            </span>
                                        </h5>
                                        <p class="mb-0 text-sm">Total Sale</p>
                                    </div>
                                </div>
                                <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                        <img class="w-100 " src="{{ asset('images/icon.svg') }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                    <div class="card card-plain h-100 bg-white">
                        <div style="border-left: 5px solid rgba(7, 241, 191, 0.388);"class="p-3">
                            <div class="row">
                                <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                    <div>
                                        <h5 class="mb-0 text-capitalize font-weight-bold">
                                            $ <span id="total">
                                                {{ $rejectedRequests }}
                                            </span>
                                        </h5>
                                        <p class="mb-0 text-sm">Total Sale</p>
                                    </div>
                                </div>
                                <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                        <img class="w-100 " src="{{ asset('images/icon.svg') }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                    <div class="card card-plain h-100 bg-white">
                        <div style="border-left: 5px solid rgba(7, 241, 191, 0.388);"class="p-3">
                            <div class="row">
                                <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                    <div>
                                        <h5 class="mb-0 text-capitalize font-weight-bold">
                                            $ <span id="total">
                                                0
                                            </span>
                                        </h5>
                                        <p class="mb-0 text-sm">Total Sale</p>
                                    </div>
                                </div>
                                <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                        <img class="w-100 " src="{{ asset('images/icon.svg') }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Reason</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($leaveRequests as $request)
                            <tr>
                                <td>{{ $request->type }}</td>
                                <td>{{ $request->start_date }}</td>
                                <td>{{ $request->end_date }}</td>
                                <td>{{ $request->reason }}</td>
                                <td>{{ $request->status }}</td>
                                <td style="display: flex ; ">
                                    <form id="approveForm" action="{{ route('leave.approve', $request->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button style="margin-right:10px" type="submit"
                                            class="btn btn-success">Accept</button>
                                    </form>

                                    <form id="rejectForm" action="{{ route('leave.reject', $request->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-danger">Reject</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </main>
    <!--Main layout-->
@endsection
