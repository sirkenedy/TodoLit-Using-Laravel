<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Todolist</title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>
	@include('inc.navbar')
	<div class="container">
		@include('inc.messages')
		@yield('content')
	</div>


	<footer id="footer" class="text-center">
		<p>Copyright &copy; 2017 TodoList</p>
	</footer>
<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>