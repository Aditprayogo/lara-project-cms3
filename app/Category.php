<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
		'name',
	];

	public function posts()
	{
		# code...
		return $this->belongsToMany('App\Post');
	}
}
