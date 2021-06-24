<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class ApiNewsController extends Controller
{
    public function showNews(){
        $allNews = News::all();
        return response()->json([
            'allNews' => $allNews,
        ]);
    }
}
