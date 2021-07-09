<x-layout>
	<div class="container pt-3 d-flex justify-content-center ">
		<div class="card w-50 ">
		  <div class="card-header">
		    <h3 class="d-flex justify-content-center">Update Password </h3>
		  </div>
		  <div class="card-body">
		    <form action="{{ route('password.update') }}" method="post">
		    	@csrf
		    	<input type="hidden" name="token" value="{{ $token }}">
		    	@if (session()->has('status'))
			    	<div class="mb-3 alert alert-success d-flex align-items-center" role="alert">
			    		<span class="">{{  session('status') }}</span>
			    	</div>
		    	@endif
		    	@if (session()->has('errormsg'))
			    	<div class="mb-3 alert alert-danger d-flex align-items-center" role="alert">
			    		<span class="">{{  session('errormsg') }}</span>
			    	</div>
		    	@endif
			  <div class="mb-3">
			    <label for="exampleInputEmail1" class="form-label">Email address</label>
			    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" value="{{ old('email') }}" >
			    <span class="text-danger">@error('email') {{ $message }} @enderror</span>
			  </div>
			  <div class="mb-3">
			    <label for="exampleInputPassword1" class="form-label">Password</label>
			    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
			    <span class="text-danger">@error('password') {{ $message }} @enderror</span>
			  </div>
			  <div class="mb-3">
			    <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
			    <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword2" placeholder="Confirm Password">
			    <span class="text-danger">@error('password_confirmation') {{ $message }} @enderror</span>
			  </div>
			  <div class="mb-3 d-grid gap-2">
			  	<button type="submit" class="btn btn-primary float-end">Update</button>
			  </div>
			</form>
			<div>
				<p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
			</div>
		  </div>
		</div>
	</div>
</x-layout>