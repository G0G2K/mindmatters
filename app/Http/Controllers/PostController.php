<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{

	/*public function __construct(){
	
		$this->middleware('auth');
	
	}	*/
	
    public function create()
    {
    	return view('posts.create');
    }
    
    public function store()
    {
    	$data = request()->validate([
    		'title' => 'required',
    		'image' => 'required|mimes:jpeg,jpg,gif,png',
    		'content' => 'required'
    	]);
    	
    	$imgPath = request('image')->store('uploads', 'public');
    	
    	auth()->user()->posts()->create([
    		'title' => $data['title'],
    		'image' => $imgPath,
    		'content' => $data['content']
    	]);
    	
    	return redirect('/profile/'. auth()->user()->id);
    }
   
   	public function edit(Post $post)	
   	{
   		return view('posts.edit', compact('post'));
   	}
   	
   	public function patch(Post $post)
   	{
   		$data = request()->validate([
   			'title' => '',
   			'content' => '',
   			'image' => ''
   		]);
   		
   		if(request('image')){
   			$imgPath = request('image')->store('uploads', 'public');
   			$imgArr = ['image' => $imgPath];
   		}
   		
   		$post->update(array_merge(
   			$data,
   			$imgArr ?? []
   		));
   		
   		$userId = auth()->user()->id;
   		
   		return redirect("/profile/{$userId}");
   		
   	}
    
    public function show($post)
    {
		$post = Post::findOrFail($post);
		
		return view('posts.show', [
			'title' => $post->title,
			'post' => $post
		]);
    }
}
