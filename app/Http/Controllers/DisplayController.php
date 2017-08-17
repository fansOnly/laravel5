<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;

class DisplayController extends Controller
{

    // 显示文章
    public function index($id){
        $article = Article::find($id);
        return view('display')->with('article',$article);
    }

}
