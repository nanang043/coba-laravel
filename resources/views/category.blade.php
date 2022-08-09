@extends('layouts.main')

@section('container')


<h1>Post Category : {{ $category }}</h1>

@foreach($forms as $form)



<article class="mb-5">

<h3><a href="/forms/{{ $form->slug }}">{{ $form->name }}</a></h3>

<h5>{{ $form->title }}</h5>



</article>

@endforeach

@endsection