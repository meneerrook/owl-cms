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
            <div id="login-pane" class="login-pane">
                <h4>Log in to continue</h2>
                <form action="/owl/authenticate" method="post">
                    @csrf

                    <div class="grouped-input">
                        <input required name="email" type="email" class="form-control">
                        <span>@&nbsp;&nbsp;E-mail</span>
                    </div>

                    <div class="grouped-input">
                        <input required name="password" type="password" class="form-control">
                        <span><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;&nbsp;Password</span>
                    </div>

                    <button id="loginButton" class="btn btn-primary btn-loader">Log in</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('js/owl/login.owl.js') }}" name="loginScript"></script>
@endsection