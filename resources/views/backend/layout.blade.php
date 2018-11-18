<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @yield('meta')
        <title>Owl</title>
		<!-- CSS -->
		<link rel="stylesheet" href="{{ asset('css/plugins/bootstrap.min.css') }}"/>
		<link rel="stylesheet" href="{{ asset('css/plugins/font-awesome.min.css') }}"/>
		<link rel="stylesheet" href="{{ asset('css/style.min.css') }}"/>
		<!-- JS plugins -->
		
        <script src="{{ asset('js/plugins/jquery.min.js') }}"></script>
		<script src="{{ asset('js/plugins/popper.min.js') }}"></script>
		<script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
		<!-- JS Owl -->
		<script src="{{ asset('js/owl/pageLoader.owl.js') }}"></script>
		<script src="{{ asset('js/owl/buttonLoader.owl.js') }}"></script>
		<script src="{{ asset('js/owl/placeholder.owl.js') }}"></script>
		<script src="{{ asset('js/owl/common.owl.js') }}"></script>

		<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,700" rel="stylesheet">
	</head>

	<body class="@yield('bodyClass')">

		@if (Auth::check())
			@include('backend/partials/pageLoader')
			@include('backend/navigation/index')
		@endif
	
		@yield('content')

        @yield('javascript')
        <script src="{{ asset('js/init.js') }}"></script>
    </body>
</html>