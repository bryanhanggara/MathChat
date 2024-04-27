@extends('layouts.app')

@section('body')
<link rel="stylesheet" href="{{url('asset_fe/css/style.css')}}">
<main>
    <div class="container d-flex">
      <div class="row">
        <div class="col-md-8">
          <div class="artikel  p-4 rounded-4">
              <div class="artikel-header">
                  <img src="{{Storage::url($blog->cover)}}" alt="" srcset="" width="100%" class="rounded-4">
              </div>
              <h3 class="artikel-title mt-3">
                {{$blog->title}}
              </h3>
              <p class="fs-5">Author | <span class="fs-6 text-secondary">{{$blog->created_at}}</span> </p>
              <p class="text-artikel ">
                {{$blog->content}}
              </p>
           </div>
        </div>
        <div class="col-md-4">
          <div class="artikel p-4 rounded-4">
            <h4 class="text-center">More Article</h4>
            <hr>
            @foreach ($blogs as $item)
            <img src="{{Storage::url($item->cover)}}" alt="recent-img" width="100%" height="200" class="rounded-4">
            <br>
            <a href="{{route('blog.view', $item->id)}}" class="fs-4">{{$item->title}}</a>
            <p class="fs-5">Author | <span class="fs-6 text-secondary">{{$item->created_at}}</span> </p>
            @endforeach
            <hr>
          </div>
          <div class="float-right">
            {{$blogs->links()}}
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
