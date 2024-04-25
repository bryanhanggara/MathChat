@extends('layouts.app')

@section('body')
<link rel="stylesheet" href="{{url('asset_fe/css/style.css')}}">
<main>
    <div class="container d-flex">
      <div class="row">
        <div class="col-md-8">
          <div class="artikel  p-4 rounded-4">
              <div class="artikel-header">
                  <img src="https://picsum.photos/700/500" alt="" srcset="" width="100%" class="rounded-4">
              </div>
              <h3 class="artikel-title mt-3">
                Judul Artikel
              </h3>
              <p class="fs-5">Author | <span class="fs-6 text-secondary">July 2020</span> </p>
              <p class="text-artikel ">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum esse voluptatum blanditiis, reprehenderit possimus explicabo tempore illo? Architecto, excepturi? Iste non impedit ipsam sequi officia eaque architecto, quae repudiandae vitae.
              </p>
           </div>
        </div>
        <div class="col-md-4">
          <div class="artikel p-4 rounded-4">
            <h4 class="text-center">Artikel Recent</h4>
            <hr>
            @foreach ($blogs as $item)
            <img src="{{Storage::url($item->cover)}}" alt="recent-img" width="100%" height="200" class="rounded-4">
            <br>
            <a href="#" class="fs-4">{{$item->title}}</a>
            <p class="fs-5">Author | <span class="fs-6 text-secondary">{{$item->created_at}}</span> </p>
            @endforeach
            <hr>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection