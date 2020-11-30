@extends('master')

@section('content')
<div style="text-align: center;font-size: 40px;" class="text-white bg-dark">Welcome to E-Notes<br>Edit your notes</div>
<div class="d-flex justify-content-center mt-5">
	<div class="shadow-lg p-3 mb-5 bg-white rounded">
		<form action="{{route('notes.update',$data->id)}}" method="POST">
			<input type="hidden" name="_method" value="PUT">
			@csrf
			Title:<br>
			<input type="text" name="title" value="{{$data->title}}"><br>
			Description:<br>
			<textarea name="description" rows="4" cols="50">{{$data->description}}</textarea><br>
			<input type="submit" value="Save">
		</form>
	</div>
</div>

@endsection
