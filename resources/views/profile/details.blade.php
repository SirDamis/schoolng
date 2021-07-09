<x-layout>
	<div class="container mt-3">
		@if((Auth::user()->email_verified_at != null))
		<div class="alert alert-danger">  
		  <strong>NOTE!</strong> Please verify your account. <a href="#">Resend Verification Code</a>
		</div>
		@endif


		<div class="row gutters-sm">
			<div class="col-md-4 mb-3">

				<div class="card">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
              <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
              <div class="mt-3">
                <h4>{{ auth()->user()->username }}</h4>
                <p class="text-secondary mb-1">Location</p>
                <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                <button class="btn btn-outline-primary">Message</button>
              </div>
            </div>
          </div>
          
      	</div>
			</div>

			<div class="col-md-8">
				<div class="card mb-3">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-3">
		                      <h6 class="mb-0">Full Name</h6>
		                    </div>
		                    <div class="col-sm-9 text-secondary">
		                     	Enter full name
		                    </div>
						</div>
						<hr>

						<div class="row">
							<div class="col-sm-3">
		                      <h6 class="mb-0">Username</h6>
		                    </div>
		                    <div class="col-sm-9 text-secondary">
		                     	{{ auth()->user()->username }}
		                    </div>
						</div>
						<hr>

						<div class="row">
							<div class="col-sm-3">
		                      <h6 class="mb-0">Email</h6>
		                    </div>
		                    <div class="col-sm-9 text-secondary">
		                    	{{ auth()->user()->email }}
		                    </div>
						</div>
						<hr>

						<div class="row">
							<div class="col-sm-3">
		                      <h6 class="mb-0">Phone Number</h6>
		                    </div>
		                    <div class="col-sm-9 text-secondary">
		                      Enter phone number
		                    </div>
						</div>
						<hr>

						<div class="row">
							<div class="col-sm-3">
		                      <h6 class="mb-0">Address</h6>
		                    </div>
		                    <div class="col-sm-9 text-secondary">
		                      Enter address
		                    </div>
						</div>
						<hr>

						<div class="row">
							<div class="col-sm-4">
		                      <span class="mb-0">Upload Your Product Picture</span>
		                    </div>
		                    <div class="col-sm-8 text-secondary">
		                     	<input type="file" name="profileimage" id="productimage" accept=".jpg,.JPG,.png,.PNG,.jpeg,.JPEG" />
		                    </div>
						</div>
						<hr>


						<div class="row">
		                    <div class="col-sm-12">
		                      <a class="btn btn-info float-end" href="{{ route('edit-profile') }}">Edit</a>
		                    </div>
		                </div>



					</div>
				</div>
            </div>

		</div>
	</div>
</x-layout>