<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class FeatureController extends Controller
{
    public function blog()
    {
        $blogs = Blog::all();
        return view('pages.fitur.blog', compact('blogs'));
    }
}
