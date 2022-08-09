@extends('layouts.main')

@section('container')


<h1>Post Categories</h1>

@foreach($categories as $category)

<ul>
	<li>
		<h3><a href="/form?category={{ $forms->category->name }}">{{ $category->name }}</a></h3>
	</li>
</ul>




@endforeach

@endsection