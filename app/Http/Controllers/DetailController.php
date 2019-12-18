<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Category;

class DetailController extends Controller
{
    public function index($slug)
	{
		# code...
		$post = Post::with(['user', 'categories'])
				->where('slug', $slug)
				->firstOrFail();

		$post->views += 1;

		$post->save();

		$categories = Category::paginate(10);

		return view('single-post', [
			'post' => $post,
			'categories' => $categories
		]);
	}
}
