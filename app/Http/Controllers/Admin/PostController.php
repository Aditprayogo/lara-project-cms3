<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$posts = Post::with(['user'])->paginate(10);
		
		return view('pages.admin.posts.index', [
			'posts' => $posts
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
			'image' => 'required|image',
			'title' => 'required|min:4',
			'body' => 'required'
		]);

		$new_post = new Post();
		$new_post->user_id = auth()->user()->id;
		$new_post->title = $request->input('title');
		$new_post->body = $request->input('body');
		$new_post->slug = \Str::slug($request->input('title'), '-');
		
		if ($request->file('image')) {
			# code...
			$new_post->image = $request->file('image')->store('assets/image', 'public');
		}

		$new_post->save();

		$new_post->categories()->attach($request->get('categories'));

		return redirect()->route('post.index')->withStatus(__('Post successfully created.'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$post = Post::with(['user'])->findOrFail($id);
		
		return view('pages.admin.posts.edit', [
			'post' => $post
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
			'image' => 'image',
			'title' => 'required|min:4',
			'body' => 'required'
		]);
		
		$post = Post::findOrFail($id);
		$input = $request->all();

		if ($request->file('image')) {

			# code...
			if ($user->image && file_exists(storage_path('app/public/assets/image/' . $user->image))) {
				# code...
				\Storage::delete('app/public/assets/image/' . $user->image);
			}

			$input['image'] = $request->file('image')->store('assets/image', 'public');
		}

		$post->update($input);

		$post->categories()->sync($request->get('categories'));

		return redirect()->route('post.index')->withStatus(__('Post successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		Post::findOrFail($id)->delete();
		
		return redirect()->route('post.index')->withStatus(__('Post successfully deleted.'));
    }
}
