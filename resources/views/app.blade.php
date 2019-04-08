<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vue Lara Shop</title>
	<link rel="stylesheet" href="{{asset('css/all.css')}}">
	<meta name="csrf-token" value="{{ csrf_token() }}" />
</head>
<body>
	<div id="app"></div>
  <script src="{{ mix('js/all.js') }}" type="text/javascript"></script>
	<script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</body>
</html>
