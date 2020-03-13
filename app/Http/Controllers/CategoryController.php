<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Create_Category_Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $category = Category::all();
        return view('project.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.createCats');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Create_Category_Request $request)
    {

        $category = $request->validated();

        $category = new Category();
        $category->name = $request->input('category');

        Session::flash('status', 'Sekmingai sukurta kategorija!');
        Session::flash('status_class', 'alert-success');

        $category->save();

        return redirect()->route('news.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Cat = Category::all();
        $filter = Category::findOrFail($id);
        return view('project.newsSorted', compact(['filter', 'Cat']));
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
        return view('project.updateCategories', compact('category'));
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
        $category = Category::findOrFail($id);
        $category->name = $request->input('category');

        Session::flash('status', 'Sekmingai atnaujinta kategorija!');
        Session::flash('status_class', 'alert-success');

        $category->update();

        return redirect()->route('news.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        Session::flash('status', 'Sekmingai istrinta kategorija!');
        Session::flash('status_class', 'alert-success');

        return redirect()->route('news.index');
    }
}