@extends('layouts.master')

@section('content')
<h1>Edit Post</h1>

{!! Form::model($post,["method" => "PATCH", "action" => ["PostController@update",$post->id]]) !!}
	
	{{csrf_field()}}

	<div class="form-group">

		{!! Form::label('title','Title:') !!}
		{!! Form::text('title',null,['class' => 'form-control'])!!}

	</div>

	<div class="form-group">
	
		{!! Form::submit('Update Post',['class' => 'btn btn-primary'])!!}		

	</div>

{!! Form::close()!!}


{!! Form::model($post,["method" => "DELETE", "action" => ["PostController@destroy",$post->id]]) !!}

	<div class="form-group">
	
		{!! Form::submit('Delete Post',['class' => 'btn btn-primary'])!!}		

	</div>

{!! Form::close()!!}

@endsection