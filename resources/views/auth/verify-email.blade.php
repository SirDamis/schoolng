<x-layout>
	<div class="container">
		<div class="card">
			@if(auth()->user()->email_verified_at)
				<p>Email Verified</p>
				@if (session()->has('message'))
					<p>{{ session('message') }}</p>
		    	@endif
			@else
				<p>Kindly verify your email.</p>
				<form action="{{ route('verification.send') }}" method="post">
					@csrf
					Can't find the link? Click the button to get verification link
					<button type="submit" class="btn btn-primary">Get link</button>
				</form>
			@endif
			
			
		</div>
		
	</div>
</x-layout>