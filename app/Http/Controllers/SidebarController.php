<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;

class SidebarController extends Controller
{
    public function index()
	{
		# code...
		$post_sidebar = Post::with(['categories', 'user'])->sortBy('views', 'asc')->take(5);

		// $category = Categories::with(['posts'])->get();

		return view('includes.frontend.sidebar', [
			'post_sidebar' => $post_sidebar,
			// 'category' => $category
		]);
	}
}
