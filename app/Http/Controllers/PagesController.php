<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about()
	{
		# code...
		$user = auth()->user();

		return view('about', [
			'user' => $user
		]);
	}

	public function contact()
	{
		# code...
		return view('contact');
	}
}
