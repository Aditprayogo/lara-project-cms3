<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
		'user_id',
		'image',
		'title',
		'slug',
		'body',
		'views'
	];

	public function user()
	{
		# code...
		return $this->belongsTo('App\User');
	}


}
