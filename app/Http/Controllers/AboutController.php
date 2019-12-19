<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\User;
use App\Post;
use App\Category;

class AboutController extends Controller
{
    public function index()
	{
		# code...
		$user = auth()->user();

		return view('about', [
			'user' => $user
		]);
	}
}
