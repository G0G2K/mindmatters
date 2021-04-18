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
			<div class="card mb-4">
                <div class="card-header"><i class="fi-torso mr-3"></i>Profile</div>

                <div class="card-body ">
                <!--
					<div class="alert alert-success small" role="alert">
                    	<i class="fi-check mr-3"></i> Logged In
                    </div> -->
                    
                    <h6>Username: <span class="text-muted">{{ $user->username }}</span></h6>
                    @if(Auth::user()->id == $user->id)
                    	<h6>Email: <span class="text-muted">{{ $user->email }}</span></h6>
                    @endif
                    <h6>Joined: <span class="text-muted">{{ $user->created_at }}</span></h6>
                    <h6 class="mb-4">Bio: <span class="text-muted">{{ $user->profile->bio ?? 'N/A Please Update your Profile' }}</span></h6>
                 	@if(Auth::user()->id == $user->id)
		                <a class="btn btn-primary mb-1" href="{{ route('edit_user', $user->id) }}">Update User Details</a>
		                <a class="btn btn-primary mb-1" href="{{ route('edit_profile', $user->id) }}">Update Profile</a>
                    @endif
                </div>
            </div>
            
            @if(Auth::user()->id == $user->id)
		        <div class="card mb-4">
		        	<div class="card-header"><i class="fi-widget mr-3"></i>More Actions</div>
		        	<div class="card-body">
				    	<a class="btn btn-primary" href="{{ route('create_post') }}">Post Something</a>
		        	</div>
		        </div>
		  	@endif
            
            <div class="card mb-4">
            	<div class="card-header">
            		<i class="fi-clipboard-pencil mr-3"></i>Posts
            		<span class="text-muted ml-1">({{ $user->posts->count() }})</span>
            	</div>
            	<div class="card-body">
            		@foreach($user->posts as $post)
            			<div class="card small mb-1">
		        			<div class="row">
				    			<div class="col-4">
		        					<img class="img-fluid mx-auto d-block rounded post-image-t" src="/storage/{{ $post->image }}">
		        				</div>
		        				<div class="col-8 p-3">
		        					<h5 class="bold mb-2"><a href="{{ route('show_post', $post->id) }}">{{ $post->title }}</a></h5>
		        					<p>Created: <span class="text-muted">{{ $post->created_at }}</span></p>
		        					@if(Auth::user()->id == $post->user->id)
		        						<a class="btn btn-success" href="{{ route('edit_post', $post->id) }}"><i class="fi-page-edit mr-2"></i>Update Post</a>
		        					@endif
		        				</div>
		        			</div>
            			</div>
            		@endforeach
            	</div>
            </div>
		
		</div>
	</div>
</div>
@endsection
