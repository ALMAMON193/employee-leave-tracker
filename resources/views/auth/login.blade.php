@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 animated fadeIn col-lg-6 center-screen">
                <div class="card w-90  p-4">
                    <div class="card-body">
                        <h4>SIGN IN</h4>
                        <br />
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <input id="email" name="email" placeholder="User Email" class="form-control"
                                type="email" />
                            <br />
                            <input id="password" name="password" placeholder="User Password" class="form-control"
                                type="password" />
                            <br />
                            <button type="submit" class="btn w-100 bg-gradient-primary">Next</button>
                            <hr />
                            <div class="float-end mt-3">
                                <span>
                                    <a class="text-center ms-3 h6" href="{{ route('register') }}">Sign Up </a>
                                    <span class="ms-1">|</span>
                                    <a class="text-center ms-3 h6" href="{{ route('password.request') }}">Forget
                                        Password</a>
                                </span>
                            </div>
                        </form> <!-- Make sure to close the form tag -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
