@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="">
		      	<div class="card">
		        	<form method="POST" action="{{ route('patch_post', $post->id) }}" enctype="multipart/form-data">
		        		<div class="h3 text-center mb-2 card-header"><i class="fi-page-edit"></i> Update Post</div>
		        		<p class="text-muted text-center">Leave blank if you dont' want any change made</p>
		                @csrf
		                <input type="hidden" id="prev-text" value="{{ $post->content }}">
						<div class="form-group row">
		                	<label for="title" class="col-sm-3 col-form-label text-md-right">Title</label>

		                    <div class="col-sm-8">
		                    	<input placeholder="title" id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $post->title }}" autocomplete="title">

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
		                    	<input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror" input="{{ old('image') }}" name="image">

		                    	@error('image')
		                        	<span class="invalid-feedback" role="alert">
		                            	<strong>{{ $message }}</strong>
		                            </span>
		                        @enderror
		                  	</div>
		              	</div>
		              	
		              	<div class="form-group row mb-4">
		                	<label for="content" class="col-sm-3 col-form-label text-md-right">Content</label>

		                    <div class="col-sm-8">
		                    	<textarea id="text" placeholder="text" name="content" rows="5" class="form-control @error('content') is-invalid @enderror"></textarea>

		                    	@error('content')
		                        	<span class="invalid-feedback" role="alert">
		                            	<strong>{{ $message }}</strong>
		                            </span>
		                        @enderror
		                  	</div>
		              	</div>
		              	
		              	<div class="row justify-content-center mb-5">
		              		<button type="submit" class="btn btn-success align-center">Update Post</button>
		              	</div>
		              	
		              	
		          	</form>
		        </div>
			</div>
		</div>
	</div>
</div>
@endsection