<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $guarded = [];
	
    public function user()
    {
    	return $this->belongsTo(User::class);	
    }
    
    public function profileImage()
	{
		$img = '/storage/' . $this->image;
		$defaultImg = asset("img/default.jpg");
		return ($this->image) ? $img : $defaultImg;
	}
}
