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
		$posts = Post::with(['user', 'categories'])->paginate(10);

		$categories = Category::paginate(10);

		return view('home', [
			'posts' => $posts,
			'categories' => $categories
		]);
	}

	public function pupular()
	{
		# code...
		$posts = Post::with(['user', 'categories'])->orderBy('views', 'asc')->take(10);

		return view('includes.frontend.sidebar', [
			'posts' => $posts
		]);
	}

	
}
