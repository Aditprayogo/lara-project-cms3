<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Category;
use App\User;

class CategoryPostController extends Controller
{
    public function postByCategory($id)
	{
		# code...
		
		$categories = Category::all();
		$category = Category::findOrFail($id);

		// $cat_id = $category->id;

		// $posts = Post::whereHas('categories', function($q) use ($cat_id) {

		// 		$q->where('id', $cat_id);

		// })->get();

		// $posts = Post::with(['categories', 'user'])->wherePivot('category_id','=', $category->id)->get();

		return view('home2', [
			// 'posts' => $posts,
			'category' => $category,
			'categories' => $categories
		]);
	}
}
