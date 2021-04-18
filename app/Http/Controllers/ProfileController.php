<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{	
	public function __construct()
	{
		$this->middleware('auth');
	}
	
    public function show($user)
    {
    	$user = User::findOrFail($user);    
    	return view('profile.profile', [
    		'title' => 'Profile',
    		'user' => $user,
    	]);
    }
    
    public function edit(\App\Profile $user)
    {	
    	return view('profile.edit', compact('user'));	
    }
    
    public function patchProfile(User $user)
    {	
    	$data = request()->validate([
    		'bio' => 'required',
    		'image' => 'mimes:jpg,jpeg,png,gif'
    	]);	
    	
    	if(request('image'))
    	{
    		$imgPath = request('image')->store('profile_img', 'public');
    		$imgArr = ['image' => $imgPath];
    	}
    	
    	auth()->user()->profile->update(array_merge(
    		$data,
    		$imgArr ?? []
    	));
    	
    	return redirect("/profile/{$user->id}");
    	
    }
    
    public function edituser(User $user)
    {
    	return view('profile.edituser', compact('user'));
    	
    }
    
    public function patchUser(User $user)
    {
    	$data = request()->validate([
    		'username' => 'required',
    		'email' => 'required|email'
    	]); 
    	
    	auth()->user()->update($data);
    	
    	return redirect("/profile/{$user->id}");
    
    }
    
}
