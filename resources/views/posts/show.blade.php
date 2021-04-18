@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="">
				<img class="mb-3 img-fluid post-image mx-auto d-block" src="/storage/{{ $post->image }}">
			</div>			
			<h2 class="text-center mb-3">{{ $post->title }}</h2>
			<hr>
			<p class="mb-4">{{ $post->content }}</p>
			
			<p class="mb-3">Created at: <span class="text-muted">{{ $post->created_at }}</span></p>
			
			<hr class="mb-5">
			
			<div class="card mb-3">
				<div class="row">
					<div class="col-3 p-3">
						<img style="height: 72px;" class="img-fluid rounded-circle ml-2" src="/storage/{{ $post->user->profile->image }}">
					</div>
					<div class="col-9">
						<div class="card-header h5 mb-2"><i class="fi-pencil mr-3"></i>Author:</div>
						<div class="h4 mb-3 ml-1">
							@guest
								{{ $post->user->username }}
							@else
								<a href="{{ route('profile', $post->user->id) }}">{{ $post->user->username }}</a>
							@endguest
						</div>
						
						<h5 class="bold ml-1 ">"<span class="text-muted">{{ $post->user->profile->bio }}</span>"</h5>
					</div>
				</div>
			</div>
			
			<div class="card">
				<div class="card-header"><i class="fi-clipboard-pencil mr-3"></i><span class="text-muted mr-1">({{ $post->user->posts->count() }})</span>Posts from {{ $post->user->username }}</div>
				<div class="card-body">
					@foreach($post->user->posts as $post)
						<div class="card small mb-1">
		        			<div class="row">
				    			<div class="col-4">
		        					<img class="img-fluid mx-auto d-block rounded post-image-t" src="/storage/{{ $post->image }}">
		        				</div>
		        				<div class="col-8 p-3">
		        					<h5 class="bold mb-2"><a href="{{ route('show_post', $post->id) }}">{{ $post->title }}</a></h5>
		        					<p>Created: <span class="text-muted">{{ $post->created_at }}</span></p>
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