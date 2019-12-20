<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;

class HomeController extends Controller
{
    public function index()
	{
		# code...
		$posts = Post::with(['user', 'categories'])->latest()->paginate(30);

		// $post_popular = Post::with(['user', 'categories'])->orderBy('views', 'asc')->get();

	

		// $categories = Category::all();

		return view('home', [
			'posts' => $posts,
			// 'categories' => $categories,
			// 'post_popular' => $post_popular
		]);
	}

	

	
}
