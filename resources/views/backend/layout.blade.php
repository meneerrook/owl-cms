<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @yield('meta')
        <title>{{ config("app.name") }}</title>
		<!-- CSS -->
		<link rel="stylesheet" href="{{ asset('css/plugins/bootstrap.min.css') }}"/>
		<link rel="stylesheet" href="{{ asset('css/plugins/font-awesome.min.css') }}"/>
		<link rel="stylesheet" href="{{ asset('css/style.min.css') }}"/>
		
		<!-- JS plugins -->
        <script src="{{ asset('js/plugins/jquery.min.js') }}"></script>
		<script src="{{ asset('js/plugins/popper.min.js') }}"></script>
		<script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/plugins/trader.js') }}"></script>
		<script src="{{ asset('js/plugins/OwlValidator.js') }}"></script>

		<!-- JS Owl -->
		<script src="{{ asset('js/owl/getPage.owl.js') }}"></script>
		<script src="{{ asset('js/owl/postData.owl.js') }}"></script>
		<script src="{{ asset('js/owl/skeleton.owl.js') }}"></script>
		<script src="{{ asset('js/owl/buttonLoader.owl.js') }}"></script>
		<script src="{{ asset('js/owl/placeholder.owl.js') }}"></script>
		<script src="{{ asset('js/owl/navigation.owl.js') }}"></script>
		<script src="{{ asset('js/owl/common.owl.js') }}"></script>
		
		<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,700" rel="stylesheet">
	</head>

	<body class="@yield('bodyClass')">
		<div id="loader-wrapper" class="loader-wrapper content-loader">
			<div class="spinner-loader">
                <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
            </div>
		</div>
		
		<div id="page-wrapper" class="page-wrapper" data-trdr="login" data-trdr-order="3" data-trdr-class="hide">
			<div id="navigation">
				@if (Auth::check())
					@include('backend/navigation/index')
				@endif
			</div>
			
			<div id="content" class="content">
				@yield('content')
			</div>
		</div>
		
		@yield('login')
		@yield('javascript')
        <script src="{{ asset('js/init.js') }}"></script>

		
    </body>
</html>