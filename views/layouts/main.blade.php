<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Scribe</title>
	{{ HTML::style('bundles/scribe/css/style.css') }}
</head>
<body>
	<div class="ribbon">&nbsp;</div>
	<div class="container">
		<h1 class="main-title">Scribe</h1>
		<h2 class="sub-title">Simple content manager for the Laravel PHP framework.</h2>
		@yield('content')
	</div>

	{{ HTML::script('bundles/scribe/js/jquery-1.7.2.min.js') }}
	{{ HTML::script('bundles/scribe/js/bootstrap.min.js') }}
</body>
</html>
