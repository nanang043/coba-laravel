@extends('layouts.main')

@section('container')

<h1 class="mb-3 text-center">{{ $title }}</h1>


<div class="row mb-5 justify-content-center">
	<div class="col-md-6">
		<form action="/form">
			@if (request('category'))
				<input type="hidden" name="category" value="{{ request('category') }}">
			@endif

			@if (request('author'))
				<input type="hidden" name="author" value="{{ request('author') }}">
			@endif

			<div class="input-group mb-3">
			  <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
			  <button class="btn btn-primary" type="submit">Search</button>
			</div>

		</form>
	</div>
</div>


@if ($forms->count())

<div class="card mb-3">
  <img src="https://source.unsplash.com/1200x400?{{ $forms[0]->category->name }}" class="card-img-top" alt="{{ $forms[0]->category->name }}">
  <div class="card-body text-center">
    <h5 class="card-title">{{ $forms[0]->author->username }}</h5>
    <p class="card-text"><small class="text-muted">By. <a href="/form?author={{ $forms[0]->author->username }}" class="text-decoration-none">{{ $forms[0]->author->username }}</a> in <a href="/form?category={{ $forms[0]->category->slug }}" class="text-decoration-none">{{ $forms[0]->category->name }}</a> {{ $forms[0]->created_at->diffForHumans() }}</small></p>

    <p class="card-text">{!! $forms[0]->excerpt !!}</p>

    <a href="/forms/{{ $forms[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>


    
  </div>
</div>




<div class="container">
	<div class="row">

		@foreach($forms->skip(1) as $form)

		<div class="col-md-4">
			<div class="card mb-3">
				<div class="position-absolute text-white px-2" style="background-color: rgba(0, 0, 0, 0.7);"><a href="/form?category={{ $form->category->slug }}" class="text-white text-decoration-none">{{ $form->category->name }}</a></div>
				  <img src="https://source.unsplash.com/500x400?{{ $form->category->name }}" class="card-img-top" alt="{{ $form->category->name }}">
				  <div class="card-body">
				    <h5 class="card-title">{{ $form->title }}</h5>
				    <p class="card-text"><small class="text-muted">By. <a href="/form?author={{ $form->author->username }}" class="text-decoration-none">{{ $form->author->username }}</a> {{ $forms[0]->created_at->diffForHumans() }}</small></p>
				    <p class="card-text">{!! $form->excerpt !!}</p>
				    <a href="/forms/{{ $form->slug }}" class="btn btn-primary">Read more</a>
  					</div>
			</div>
		</div>

		@endforeach

@else

<p class="text-cente fs-4" class="text-center">New post not Pound</p>

@endif


<div class="d-flex justify-content-center mb-5">
{{ $forms->links() }}
</div>

	</div>
</div>




@endsection