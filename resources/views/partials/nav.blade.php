<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="#">Laravel Blog</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarNavDropdown">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item {{ Request::is('/') ? 'active' : ''}}">
				<a class="nav-link" href="/">Home</a>
			</li>
			<li class="nav-item {{ Request::is('blog') ? 'active' : ''}}">
				<a class="nav-link" href="blog">Blog</a>
			</li>
			<li class="nav-item {{ Request::is('about') ? 'active' : ''}}">
				<a class="nav-link" href="/about">About</a>
			</li>
			<li class="nav-item {{ Request::is('contact') ? 'active' : ''}}">
				<a class="nav-link" href="/contact">Contact</a>
			</li>
		</ul>
		<ul class="navbar-nav navbar-right">
		@if (Auth::check()) 
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Hello {{ Auth::user()->name }}
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="{{ route('posts.index') }}">Posts</a>
					<a class="dropdown-item" href="{{ route('categories.index') }}">Categories</a>
					<a class="dropdown-item" href="{{ route('tags.index') }}">Tags</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
				</div>
			</li>
		@else 
			<a href="{{ route('login') }}" class="btn btn-default">Login</a>
		@endif

		</ul>
	</div>
</nav>
