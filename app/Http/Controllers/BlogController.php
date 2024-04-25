<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::orderBy("created_at","desc")->paginate(10);
        return view("pages.admin.blog.index", compact("blogs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' =>'required',
            'cover' => 'required|image|max:2048',
            'content' => 'required'
        ]);

        $data = new Blog;
        $data->title = $request->title;
        $data['cover']=$request->file('cover')
            ->store('cover', 'public');

        $data->content = $request->content;

        $data->save();

        return redirect()->route('blog.index')->with([
            'sucess' => 'Berhasil Menambahkan Blog'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
