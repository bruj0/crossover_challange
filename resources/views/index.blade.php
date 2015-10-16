<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Crossover Challenge</title>

    
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
    body{
      background: url("img/hixs_pattern_evolution.png");
    }
    .form-inline{
	  margin: 0 auto;
	  width:24%
    }
	#result_table {
	  background-color: #ffffff;
	}
    </style>
  </head>

  <body>

    @yield('content')
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
	@stack('scripts')
  </body>
</html>