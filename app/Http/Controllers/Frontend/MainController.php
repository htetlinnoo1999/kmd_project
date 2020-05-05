<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //todo: Main display functions! Keep going dude!^^

    public function index()
    {
//        $category = Category::with('product')->get();
        $categories = Category::has('product')->with('product')->get();
        return view('frontend.index', compact('categories'));
//        return "hello world";
    }
}
