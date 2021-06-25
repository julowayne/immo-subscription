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
        $Allnews = News::all()->where('published', 'TRUE');
        return Inertia::render('News', ["Allnews" => $Allnews]);
    }

    public function lastNews(){
        
        $Allnews = News::latest()->take(5)->where('published', 'TRUE')->get();

        return Inertia::render('Welcome', ["Allnews" => $Allnews]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'date' => 'required',
        ]);

        $news = new News;
        $news->title = $request->input('title');
        $news->body = $request->get('body');
        $news->date = $request->get('date');
        $news->published = $request->get('published');
        $news->user_id = Auth::id();

        if($news->image != $request->image){
            if(!empty($news->image_id)){
                cloudinary()->uploadApi()->destroy($news->image_id);
            }
            $image = $request->image->storeOnCloudinary();
            $news->image = $image->getPath();
            $news->image_id = $image->getPublicId();
        }

        $news->save();

        return redirect()->back();
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
        $singleNews = News::query()->where('id', $id)->first();
        return Inertia::render('SingleNews', ["singleNews" => $singleNews]);
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
    public function update(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'date' => 'required',
            'published' => 'required',
        ]);
        
        $news = News::where('id', $request->id )->first();
        $news->title = $request->input('title');
        $news->body = $request->get('body');
        $news->date = $request->get('date');
        $news->published = $request->get('published');
        if($news->image != $request->image){
            if(!empty($news->image_id)){
                cloudinary()->uploadApi()->destroy($news->image_id);
            }
            $image = $request->image->storeOnCloudinary();
            $news->image = $image->getPath();
            $news->image_id = $image->getPublicId();
        }
        $news->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $news = News::where('id', $request->id )->first();
        cloudinary()->uploadApi()->destroy($news->image);
        $news->delete();
        return redirect()->back();
    }
    public function search(Request $request){
        $search = $request->input('search');

        $newsFromQuery = News::query()
            ->where('title', 'like', "%{$search}%")
            ->orWhere('body', 'like', "%{$search}%")
            ->get();
        return Inertia::render('NewsFromQuery', ["newsFromQuery" => $newsFromQuery]);

    }
}
