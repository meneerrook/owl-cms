@extends('backend/layout')

@section('bodyClass', 'login')

@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <div id="login-container" class="login-container">
        <div id="login-wrapper" class="login-wrapper">
            <div class="heading">
                <div class="logo">
                    <img src="../images/owl_logo.svg" alt="Owl CMS">
                </div>
                <div class="title">
                    <h1>Owl CMS</h1>
                </div>
            </div>
            <div class="login-pane">
                <h4>Log in to continue</h2>
                <form action="/owl/authenticate" method="post">
                    @csrf

                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="email-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                        </div>
                        <input rquired name="email" type="email" class="form-control" placeholder="E-mail" aria-label="E-mail" aria-describedby="email-addon">
                    </div>

                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="password-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                        </div>
                        <input rquired name="password" type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                    </div>

                    <button id="loginButton" class="btn btn-primary btn-loader">Log in </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('js/owl/login.owl.js') }}" name="loginScript"></script>
@endsection