@extends('layouts.admin')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Blog</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Edit Blog</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data" class="card p-4">
            @csrf
            <label for="title">Judul Blog</label>
            <input type="text" name="title" class="form-control" value="{{$blog->title}}">

            <label for="cover">Sampul</label>
            <input type="file" name="cover" class="form-control">

            <div class="card mt-4">
                <div class="card-body">
                  <h5 class="card-title">Content Blog</h5>
    
                  <!-- Quill Editor Full -->
                  <p>Kreasikan Tulisanmu</p>
        
                  <textarea class="tinymce-editor" name="content">
                    {{$blog->content}}
                  </textarea><!-- End TinyMCE Editor -->
                  <!-- End Quill Editor Full -->
    
                </div>
              </div>

              <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </section>

</main>
@endsection