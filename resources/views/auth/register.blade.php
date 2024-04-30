@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-10 center-screen">
                <div class="card animated fadeIn w-100 p-3">
                    <div class="card-body">
                        <h4>Sign Up</h4>
                        <hr />
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="container-fluid m-0 p-0">
                                <div class="row m-0 p-0">
                                    <div class="col-md-4 p-2">
                                        <label>Email Address</label>
                                        <input id="email" name="email" placeholder="User Email" class="form-control"
                                            type="email" />
                                    </div>
                                    <div class="col-md-4 p-2">
                                        <label>Name</label>
                                        <input id="name" name="name" placeholder="Name" class="form-control"
                                            type="text" />
                                    </div>
                                    <div class="col-md-4 p-2">
                                        <label>Password</label>
                                        <input id="password" name="password" placeholder="User Password"
                                            class="form-control" type="password" />
                                    </div>
                                    <div class="col-md-4 p-2">
                                        <label>Password Confirmation</label>
                                        <input id="password_confirmation" name="password_confirmation"
                                            placeholder="Confirm Password" class="form-control" type="password" />
                                    </div>
                                </div>
                                <div class="row m-0 p-0">
                                    <div class="col-md-4 p-2">
                                        <button type="submit" class="btn mt-3 w-100  bg-gradient-primary">Complete</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
