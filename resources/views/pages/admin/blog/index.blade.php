@extends('layouts.admin')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>List Blogs</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">List Blogs</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <table class="table table-striped">
            <th>No</th>
            <th>Nama</th>
            <th>Created At</th>
            <th>Aksi</th>
            @forelse ($blogs as $blog)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$blog->title}}</td>
                    <td>{{$blog->created_at}}</td>
                    <td>
                        <a href="{{route('blog.edit', $blog->id)}}" class="btn btn-warning"><i class="bi bi-pen"></i></a>
                    </td>
                </tr>
            @empty
                <tr class="text-center">
                    <td colspan="12">
                        Empty of Data
                    </td>
                </tr>
            @endforelse
        </table>
    </section>

</main>
@endsection