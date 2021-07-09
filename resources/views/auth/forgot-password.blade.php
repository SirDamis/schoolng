<x-layout>
	<div class="container pt-3 d-flex justify-content-center">
		<div class="card w-50 ">
		  <div class="card-header">
		    <h3 class="d-flex justify-content-center">Forgot Password</h3>
		  </div>
		  <div class="card-body ">
		    <form action="{{ route('password.email') }}" method="post">
		    	@csrf
		    	@if (session()->has('errormsg'))
			    	<div class="mb-3 alert alert-danger d-flex align-items-center" role="alert">
			    		<span class="">{{ session('errormsg') }}</span>
			    	</div>
			    @endif
			    @if (session()->has('msg'))
			    	<div class="mb-3 alert alert-success d-flex align-items-center" role="alert">
			    		<span class="">{{ session('msg') }}</span>
			    	</div>
		    	@endif
			  <div class="mb-3">
			    <label for="exampleInputEmail1" class="form-label">Email address</label>
			    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" value="{{ old('email') }}">
			    <span class="text-danger">@error('email') {{ $message }} @enderror</span>
			  </div>
			  <span class="text-danger">@error('errormsg') {{ $message }} @enderror</span>
			  <div class="mb-3">
			  	<button type="submit" class="btn btn-primary float-end">Reset</button>
			  </div>
			</form>
			<div >
				<p>Don't have an account? <a href="/register">Sign Up</a></p>
			</div>
		  </div>
		</div>
	</div>
</x-layout>