<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\user;
use App\Category;
use App\Post;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

		$userCount = User::count();
		$categoryCount = Category::count();
		$postCount = Post::count();

        return view('pages.dashboard', [
			'userCount' => $userCount,
			'categoryCount' => $categoryCount,
			'postCount' => $postCount
		]);
    }
}
