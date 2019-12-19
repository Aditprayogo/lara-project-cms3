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
		$posts = Post::with(['user', 'categories'])->paginate(3);

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

	public function postByCategory($id)
	{
		# code...
		
		// $categories = Category::all();
		$category = Category::findOrFail($id);

		// $posts = Post::whereHas('categories', function($q) use ($category_id) {

		// 		$q->where('id', $catId);

		// })->get();

		$posts = $category->posts()->wherePivot('category_id' ,'=', $category)->get();

		return view('home2', [
			'posts' => $posts,
		]);
	}
}
