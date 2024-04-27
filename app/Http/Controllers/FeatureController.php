<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class FeatureController extends Controller
{
    public function blog()
    {
        $blogs = Blog::paginate(10);
        return view('pages.fitur.blog', compact('blogs'));
    }

    public function show($id)
    {
        $blog = Blog::findorfail($id);
        $blogs = Blog::paginate(2);
        return view('pages.fitur.detailBlog', compact('blog','blogs'));
    }
}
