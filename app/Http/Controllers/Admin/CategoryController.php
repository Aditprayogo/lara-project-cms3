<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$categories = Category::with(['posts'])->paginate(10);
		
		return view('pages.admin.categories.index',[
			'categories' => $categories
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.categories.create');
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
			'name' => 'required'
		]);

		$input = $request->all();

		Category::create($input);

		return redirect()->route('category.index')->withStatus(__('Category successfully created.'));
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
		$category = Category::findOrFail($id);
		
		return view('pages.admin.categories.edit',[
			'category' => $category
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
			'name' => 'required'
		]);

		$input = $request->all();

		Category::findOrFail($id)->update($input);

		return redirect()->route('category.index')->withStatus(__('Category successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
	 * $keyword =
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		Category::findOrFail($id)->delete();
		
		return redirect()->route('category.index')->withStatus(__('Category successfully deleted'));
	}

	public function ajaxSearch(Request $request)
	{
		# code...
		$keyword = $request->get('q');

		$categories = Category::where('name', 'LIKE', "%$keyword%")->get();

		return $categories;
	}
}
