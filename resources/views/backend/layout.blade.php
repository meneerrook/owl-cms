<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @yield('meta')
        <title>Owl</title>

		<link rel="stylesheet" href="{{ asset('css/plugins/bootstrap.min.css') }}"/>
		<link rel="stylesheet" href="{{ asset('css/plugins/font-awesome.min.css') }}"/>
		<link rel="stylesheet" href="{{ asset('css/style.min.css') }}"/>

        <script src="{{ asset('js/plugins/jquery.min.js') }}"></script>
		<script src="{{ asset('js/plugins/popper.min.js') }}"></script>
		<script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

	</head>

	<body class="@yield('bodyClass')">

		@yield('content')

        @yield('javascript')
        <script src="{{ asset('js/init.js') }}"></script>
    </body>
</html>