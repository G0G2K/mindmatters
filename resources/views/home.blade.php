@extends('layouts.app')

@section('content')
<div class="container">
	<h3>Recent Posts</h3>
	<div>
		@foreach($posts as $post)
			<div class="card mb-2">
				<div class="row">
					<div class="col-3 p-3">
						<img class="img-fluid ml-2 rounded home-post-img" src="/storage/{{ $post->image }}">
					</div>
					<div class="col-9">
						<div class="card-header h4"><a href="{{ route('show_post', $post->id) }}">{{ $post->title }}</a></div>
						<div class="card-body">
							<h5 class="">
								By: @guest 
									{{ $post->user->username }}
								@else 
									<a href="{{ route('profile', $post->user->id) }}">{{ $post->user->username }}</a>
								@endguest</h5>
							<p class="mb-2">{{ $post->content }}</p>
							<p>Created at: <span class="text-muted">{{ $post->created_at }}</span></p>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>
@endsection