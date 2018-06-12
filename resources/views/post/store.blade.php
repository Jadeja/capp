@extends('layouts.master')

@section('content')
<h1>Store Post</h1>

<form method="Post" action="/post">
	<input type="text" name="title" pladeholder="Enter Title">
	<input type="submit" name="submit" value="Submit">
</form>

@endsection