
@extends('layouts.main')

@section('container')



<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<h3>{{ $forms->author->username }}</h3>

			<p>Category : <a href="/form?category={{ $forms->category->slug }}" class="text-decoration-none">{{ $forms->category->name }}</p></a>


			<img src="https://source.unsplash.com/1200x400?{{ $forms->category->name }}" alt="{{ $forms->category->name }}" class="img-fluid">


			<article class="my-3 fs-4">

			<h4>{{ $forms->title }}</h4>

			<p>{!! $forms->deskripsi !!} </p>

			</article>



			<a href="/form">Back to form</a>
		</div>
	</div>
</div>






@endsection