@extends('layouts.master')

@section('content')

<ul>
		@foreach($post as $p)
			<div class="image-container">
				<img src="{{$p->path}}" height="100" alt="">
			</div>
			<a href="{{route('post.show',$p->id)}}"><li>{{ $p->title }}</li></a>
		@endforeach
</ul>

@endsection