<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="robots" content="noindex,nofofllow">
	<title>{{ config('app.name', 'Laravel Responsive File Manager') }}</title>
	@include('laravel-gallery::style')
</head>
<body>
<noscript>
	<strong>
		{{ __("We're sorry but laravel-gallery doesn't work properly without JavaScript enabled. Please enable it to continue.") }}
	</strong>
</noscript>
<div id="laravel-gallery">
	<App/>
	<br>
	@include('laravel-gallery::inputs')
	
	@include('laravel-gallery::upload')
	
	<div class="container-fluid">
		
		@include('laravel-gallery::header')
		
		@include('laravel-gallery::breadcrumb')
		
		@include('laravel-gallery::body')
	
	</div>
</div>
@include('laravel-gallery::script')

</body>
</html>
