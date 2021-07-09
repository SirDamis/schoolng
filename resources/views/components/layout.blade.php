<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Schoolng - </title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
	<style>
		*{
			padding: 0;
			margin: 0;
			box-sizing: border-box;
		}
	</style>
</head>
<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <div class="container">
		    <a class="navbar-brand" href="/">SCHOOLNG</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarNavDropdown">
		      <ul class="navbar-nav ms-auto">
		      	@auth
			        <li class="nav-item" class="align-item-center">
			        	<span class="nav-link">Welcome, {{ auth()->user()->username }}!</span>
			        </li>
			    @endauth
		        <li class="nav-item pe-2">
		          <a class="nav-link active" aria-current="page" href="/">Home</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="/">About</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="/">Pricing</a>
		        </li>
		        @auth
		        	<li class="nav-item">
			          <a class="nav-link" href="/profile">Profile</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link" href="/logout">Logout</a>
			        </li>
		        @else
			        <li class="nav-item">
			        	<a class="nav-link" href="/login">Login</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link" href="/register">Register</a>
			        </li>
		        @endauth
		      </ul>
		    </div>
		  </div>
		</nav>
        

	{{ $slot }}

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
</body>
</html>