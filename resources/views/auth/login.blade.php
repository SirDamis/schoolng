<x-layout>
	<div class="container pt-3 d-flex justify-content-center">
		<div class="card w-50 ">
		  <div class="card-header">
		    <h3 class="d-flex justify-content-center">Login</h3>
		  </div>
		  <div class="card-body">
		    <form action="{{ route('login-post') }}" method="post">
		    	@csrf
		    	@if (session()->has('success'))
			    	<div class="mb-3 alert alert-success d-flex align-items-center" role="alert">
			    		<span class="">{{ session('success') }}</span>
			    	</div>
		    	@endif
		    	@if (session()->has('verification_msg'))
			    	<div class="mb-3 alert alert-success d-flex align-items-center" role="alert">
			    		<span class="">{{ session('verification_msg') }}</span>
			    	</div>
		    	@endif
		    	@if (session()->has('update_msg'))
			    	<div class="mb-3 alert alert-success d-flex align-items-center" role="alert">
			    		<span class="">{{ session('update_msg') }}</span>
			    	</div>
		    	@endif
			  <div class="mb-3">
			    <label for="exampleInputEmail1" class="form-label">Email address</label>
			    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" value="{{ old('email') }}">
			    <span class="text-danger">@error('email') {{ $message }} @enderror</span>
			  </div>
			  <div class="mb-3">
			    <label for="exampleInputPassword1" class="form-label">Password</label>
			    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Enter Password">
			    <span class="text-danger">@error('password') {{ $message }} @enderror</span>
			  </div>
			  <div class="mb-3">
			  	<span class="text-danger">@error('error_message') {{ $message }} @enderror</span>
			  </div>
			   
			  <div class="mb-3">
			  	<a href="{{ route('password.request') }}">Forgot Password</a>
			  	<button type="submit" class="btn btn-primary float-end">Login</button>
			  </div>
			</form>
			<div>
				<p>Don't have an account? <a href="/register">Sign Up</a></p>
				<p>Didn't get the verification link? <a href="/">Request for new link</a>.</p>
			</div>
		  </div>
		</div>
	</div>
</x-layout>