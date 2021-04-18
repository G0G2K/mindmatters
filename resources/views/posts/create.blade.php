@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
			
				<div class="card-header h3 text-center mb-3"><i class="fi-plus"></i> Create Post</div>

		      	<div class="">
		        	<form method="POST" action="{{ route('store_post') }}" enctype="multipart/form-data">
		                @csrf
						<div class="form-group row">
		                	<label for="title" class="col-sm-3 col-form-label text-md-right">Title</label>

		                    <div class="col-sm-8">
		                    	<input placeholder="title" id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title">

		                    	@error('title')
		                        	<span class="invalid-feedback" role="alert">
		                            	<strong>{{ $message }}</strong>
		                            </span>
		                        @enderror
		                  	</div>
		              	</div>
		              	
		              	<div class="form-group row">
		                	<label for="image" class="col-sm-3 col-form-label text-md-right">Image</label>

		                    <div class="col-sm-8">
		                    	<input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" required>

		                    	@error('image')
		                        	<span class="invalid-feedback" role="alert">
		                            	<strong>{{ $message }}</strong>
		                            </span>
		                        @enderror
		                  	</div>
		              	</div>
		              	
		              	<div class="form-group row mb-3">
		                	<label for="content" class="col-sm-3 col-form-label text-md-right">Content</label>

		                    <div class="col-sm-8">
		                    	<textarea placeholder="text" name="content" rows="5" class="form-control @error('content') is-invalid @enderror" required></textarea>

		                    	@error('content')
		                        	<span class="invalid-feedback" role="alert">
		                            	<strong>{{ $message }}</strong>
		                            </span>
		                        @enderror
		                  	</div>
		              	</div>
		              	
		              	<div class="row justify-content-center mb-5">
		              		<button type="submit" class="btn btn-success align-center">Submit Post</button>
		              	</div>
		              	
		              	
		          	</form>
		        </div>
			</div>
		</div>
	</div>
</div>
@endsection