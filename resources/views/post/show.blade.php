@extends('layouts.master')

@section('content')


		<a href="/post/{{$post->id}}/edit"><h1>{{ $post->title }}</h1></a>


@endsection