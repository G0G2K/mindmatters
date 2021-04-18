@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="">
		      	<div class="card">
		        	<form method="POST" action="">
						<h3 class="card-header text-center mb-2"><i class="mr-2 fi-comment-quotes"></i> Contact Us</h3>
						<p class="text-center text-muted">Write to us and we'll get back to you ASAP!</p>
						
						<div class="form-group row">
		                	<label for="title" class="col-sm-3 col-form-label text-md-right">Title</label>

		                    <div class="col-sm-8">
		                    	<input placeholder="you@example.com" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

		                    	@error('email')
		                        	<span class="invalid-feedback" role="alert">
		                            	<strong>{{ $message }}</strong>
		                            </span>
		                        @enderror
		                  	</div>
		              	</div>
						
						<div class="form-group row mb-4">
		                	<label for="message" class="col-sm-3 col-form-label text-md-right">Message</label>

		                    <div class="col-sm-8">
		                    	<textarea placeholder="message" name="message" rows="5" class="form-control @error('message') is-invalid @enderror" value="{{ old('message') }}"></textarea>

		                    	@error('message')
		                        	<span class="invalid-feedback" role="alert">
		                            	<strong>{{ $message }}</strong>
		                            </span>
		                        @enderror
		                  	</div>
		              	</div>
		              	
		              	<div class="row justify-content-center mb-5">
		              		<button type="submit" class="btn btn-success align-center">Submit Response</button>
		              	</div>
						
					</form>
				</div>
			</div>
			
		</div>
	</div>
</div>
@endsection