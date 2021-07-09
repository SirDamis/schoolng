


<!-- <script>
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}
</script> -->

<x-layout>
	<div class="container mt-3">
		<div class="alert alert-danger">  
		  <strong>NOTE!</strong> Please verify your account. <a href="#">Resend Verification Code</a>
		  <span class="closebtn float-end">&times;</span>
		</div>

		<div class="row gutters-sm">
			<div class="col-md-4 mb-3">

				<div class="card">
	                <div class="card-body">
	                  <div class="d-flex flex-column align-items-center text-center">
	                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
	                    <div class="mt-3">
	                      <h4>{{ auth()->user()->username }}</h4>
	                      <p class="text-secondary mb-1">Occupation</p>
	                      <p class="text-muted font-size-sm">Location</p>
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
      				<input type="tel" class="form-control mb-3" value="{{ request()->email ) }}">
        		</div>
						<hr>

						<div class="row">
							<div class="col-sm-3">
                <h6 class="mb-0">Phone Number</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="tel" class="form-control mb-3" placeholder="Phone Number">
              </div>
						</div>
						<hr>

						<div class="row">
							<div class="col-sm-3">
                <h6 class="mb-0">Address</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="tel" class="form-control mb-3" placeholder="Address">
              </div>
						</div>
						<hr>

						<div class="row">
              <div class="col-sm-12">
                <a class="btn btn-info float-end" target="__blank" href="#">Submit</a>
              </div>
          	</div>

					</div>
				</div>
      </div>

		</div>
	</div>
</x-layout>