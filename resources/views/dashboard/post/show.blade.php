@extends('dashboard.layouts.main')


@section('container')
<div class="container mt-3 mb-3">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h3>{{ $post->author->username }}</h3>

      <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">


      <a href="/dashboard/posts" class="btn btn-success mt-3"><span data-feather="" class="align-text-bottom"></span>Back To my post</a>

      <a href="#" class="btn btn-warning mt-3"><span data-feather="edit" class="align-text-bottom"></span>Edit</a>


      <a href="#" class="btn btn-danger mt-3"><span data-feather="edit" class="align-text-bottom"></span>Delete</a>



      <article class="my-3 fs-4">

      <h4>{{ $post->title }}</h4>

      <p>{!! $post->deskripsi !!} </p>

      </article>

    </div>
  </div>
</div> 
@endsection