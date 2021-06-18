<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Allnews = News::all();
        return Inertia::render('News', ["Allnews" => $Allnews]);
    }

    public function lastNews(){
        
        $Allnews = News::latest()->take(5)->get();

        return Inertia::render('Welcome', ["Allnews" => $Allnews]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $news = new News;
        $news->title = $request->input('title');
        $news->body = $request->get('body');
        $news->date = $request->get('date');
        $news->published = $request->get('published');
        $news->user_id = Auth::id();
        $request->image->storeOnCloudinary();
        $news->save();

        return Inertia::render('admin/newsdashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Allnews = News::all();
        return Inertia::render('Admin/NewsDashboard', ["Allnews" => $Allnews]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $singleNews = News::where('id', $id);
        return Inertia::render('Admin/NewsDashboard', ["singleNews" => $singleNews]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

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
        $news = News::where('id', $id);
        $news->title = $request->input('title');
        $news->body = $request->get('body');
        $news->date = $request->get('date');
        $news->published = $request->get('published');
        $news->user_id = Auth::id();
        $request->image->storeOnCloudinary();
        $news->save();
        return Inertia::render('Admin/NewsDashboard', ["news" => $news]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
