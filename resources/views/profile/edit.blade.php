@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<div classs="sidebar">
				<img class="img-fluid rounded-circle mx-auto d-block profile-img mb-3" src="{{ $user->profileImage() }}">
				<p class="text-center">{{ $user->user->username }}</p>
			</div>
			
		</div>
		<div class="col-md-9">
			<div class="card">
				<div class="card-header"><i class="fi-torso mr-3"></i> Edit Profile</div>
				<div class="card-body">
					<form method="POST" action="{{ route('patch_profile', $user->user->id) }}" enctype="multipart/form-data">
		                @csrf
						<div class="form-group row">
		                	<label for="bio" class="col-sm-2 col-form-label text-md-right">Bio</label>

		                    <div class="col-sm-9">
		                    	<input placeholder="bio" id="bio" type="text" class="form-control @error('bio') is-invalid @enderror" name="bio" value="{{ old('bio') ?? $user->bio }}" required autocomplete="bio">

		                    	@error('bio')
		                        	<span class="invalid-feedback" role="alert">
		                            	<strong>{{ $message }}</strong>
		                            </span>
		                        @enderror
		                  	</div>
		              	</div>
		              	
		              	<div class="form-group row mb-3">
		                	<label for="image" class="col-sm-2 col-form-label text-md-right">Image</label>

		                    <div class="col-sm-9">
		                    	<input id="image" type="file" value="{{ old('file') ?? $user->image }}" class="form-control-file @error('image') is-invalid @enderror" name="image">

		                    	@error('image')
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