<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class ApiNewsController extends Controller
{
    public function showNews(){
        $allNews = News::all()->where('published', true)->paginate(2);

        return response()->json([
            'allNews' => $allNews,
        ]);
    }
}