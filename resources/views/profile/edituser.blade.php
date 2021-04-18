@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<div classs="sidebar">
				<img class="img-fluid rounded-circle mx-auto d-block profile-img mb-3" src="{{ $user->profile->profileImage() }}">
				<p class="text-center">{{ $user->username }}</p>
			</div>
			
		</div>
		<div class="col-md-9">
			<div class="card">
				<div class="card-header">Edit User Details</div>
				<div class="card-body">
					<form method="POST" action="{{ route('patch_user', $user->id) }}">
		                @csrf
						<div class="form-group row">
		                	<label for="username" class="col-sm-3 col-form-label text-md-right">Username</label>

		                    <div class="col-sm-9">
		                    	<input placeholder="username" id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') ?? $user->username }}" required autocomplete="username">

		                    	@error('username')
		                        	<span class="invalid-feedback" role="alert">
		                            	<strong>{{ $message }}</strong>
		                            </span>
		                        @enderror
		                  	</div>
		              	</div>
		              	
		              	<div class="form-group row">
		                	<label for="email" class="col-sm-3 col-form-label text-md-right">Email</label>

		                    <div class="col-sm-9">
		                    	<input placeholder="you@example.com" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}" required autocomplete="email">

		                    	@error('email')
		                        	<span class="invalid-feedback" role="alert">
		                            	<strong>{{ $message }}</strong>
		                            </span>
		                        @enderror
		                  	</div>
		              	</div>
		              	
		              	<div class="row justify-content-center mb-5">
		              		<button class="btn btn-success" type="submit">Submit</button>
		              	</div>
		              	
		        	</form>
				</div>
			</div>
		
		</div>
	</div>
</div>
@endsection