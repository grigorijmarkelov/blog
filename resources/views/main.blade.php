@include('partials.head')
@yield('stylesheets')
<body>
@include('partials.nav')
<div class="container">
	@include('partials.messages')
	@yield('content')
</div>
@include('partials.javascriptFiles')
@yield('scripts')
</body>
</html>
