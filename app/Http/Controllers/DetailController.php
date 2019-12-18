<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Category;

class DetailController extends Controller
{
    public function index($id)
	{
		# code...
		$post = Post::with(['user', 'categories'])->findOrFail($id);

		return view('single-post', [
			'post' => $post
		]);
	}
}
