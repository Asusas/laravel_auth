<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Create_News_Request;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $NewsItem = News::orderBy('created_at', 'DESC')->paginate(3);
        $Cat = Category::all();
        return view('project.index', compact(['NewsItem', 'Cat']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Cat = Category::all();
        return view('project.createNews', compact('Cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Create_News_Request $request)
    {
        $NewsItem = $request->validated();

        $NewsItem = new News();

        $NewsItem->title = $request->input('name');
        $NewsItem->content = $request->input('content');
        $NewsItem->category_id = $request->input('select_cat');
        $NewsItem->user_id = $request->input('user');

        // Arba:
        //____________________________________________
        // $NewsItem->user_id = Auth::user()->id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageExtension = $image->getClientOriginalExtension();
            $imageName = date('Y_m_d_H') . '.' . $imageExtension;
            $image->move('uploads/photos/', $imageName);

            $NewsItem->image = $imageName;

        } else {
            $NewsItem->image = 'default.png';
        }

        Session::flash('status', 'Sekmingai sukurta naujiena!');
        Session::flash('status_class', 'alert-success');

        $NewsItem->save();

        return redirect()->route('news.index');

    }

    // return redirect()->route('news.index');

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $NewsItem = News::findOrFail($id);
        return view('project.showArticle', compact('NewsItem'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $NewsItem = News::findOrFail($id);
        return view('project.updateNews', compact('NewsItem'));

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
        $NewsItem = News::findOrFail($id);

        $NewsItem->title = $request->input('title');
        $NewsItem->content = $request->input('content');
        $NewsItem->user_id = $request->input('user');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageExtension = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $imageExtension;
            $image->move('uploads/photos/', $imageName);
            $NewsItem->image = $imageName;

        } else {
            $NewsItem->image = 'default.png';
        }

        Session::flash('status', 'Sekmingai atnaujinta naujiena!');
        Session::flash('status_class', 'alert-success');

        $NewsItem->update();

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
        $NewsItem = News::findOrFail($id);
        $NewsItem->delete();

        Session::flash('status', 'Sekmingai istrinta naujiena!');
        Session::flash('status_class', 'alert-success');

        return redirect()->route('news.index');

    }
}