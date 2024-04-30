@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6 center-screen">
                <div class="card animated fadeIn w-90  p-4">
                    <div class="card-body">
                        <h4>EMAIL ADDRESS</h4>
                        <br />

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <label>Your email address</label>
                            <input id="email" name="email" placeholder="User Email" class="form-control"
                                type="email" />
                            <br />
                            <button type="submit" class="btn w-100 float-end bg-gradient-primary">Next</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
