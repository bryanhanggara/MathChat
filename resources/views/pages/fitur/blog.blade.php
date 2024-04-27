@extends('layouts.app')

@section('body')
    <div class="container">
        <h2 class="text-center mt-4">Blog For You</h2>
        <div class="row">
            @foreach ($blogs as $blog)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <img src="{{Storage::url($blog->cover)}}" alt="cover" width="100%">
                    </div>
                    <div class="card-body">
                        <h4>
                            {{$blog->title}}
                        </h4>
                        <p>
                            {{\Illuminate\Support\Str::limit($blog->content, $limit = 70, $end = '...')}}
                        </p>
                        <hr>
                        <a href="{{route('blog.view', $blog->id)}}" class="btn btn-primary">Read</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="float-right">
            {{$blogs->links()}}
        </div>
    </div>
@endsection