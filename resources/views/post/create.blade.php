@extends('layouts.master')

@section('content')
<h1>Create Post</h1>
<!-- <form method="Post" action="/post">
 -->	

{!! Form::open(["method" => "POST", "action" => "PostController@store","files" => true]) !!}
	
	<div class="form-group">

		{!! Form::label('title','Title:') !!}
		{!! Form::text('title',null,['class' => 'form-control'])!!}

	</div>

	<div class="form-group">

		{!! Form::label('title','Title') !!}
		{!! Form::file('file',['class' => 'form-control']) !!}

	</div>

	<div class="form-group">
	
		{!! Form::submit('Create Post',['class' => 'btn btn-primary'])!!}		

	</div>


{!! Form::close()!!}

<div class="alert alert-danger">
	@if(count($errors) > 0)
	<ul>
		@foreach( $errors->all() as $e)
			<li>{{$e}}</li>
		@endforeach
	</ul>	
	@endif
</div>

@endsection