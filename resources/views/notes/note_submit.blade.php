@extends('master')

@section('content')
<div style="text-align: center;font-size: 40px;" class="text-white bg-dark">Welcome to E-Notes</div>
<div class="d-flex justify-content-center mt-5">
	<div class="shadow-lg p-3 mb-5 bg-white rounded">
		<form action="/notes" method="POST">
			@csrf
			Title:<br>
			<input type="text" name="title"><br>
			Description:<br>
			<textarea name="description" rows="4" cols="50"></textarea><br>
			<input type="submit" value="Submit">
			<input type="reset" value="Reset">
		</form>
	</div>
</div>

<h1><center><b><i>My Notes</i></b></center></h1>
<div class="row my-4 mx-4">
	@foreach($data as $notes)
	<div class="card mx-3 my-2" style="width: 18rem;">
	  <div class="card-body">
	    <h5 class="card-title">{{$notes->title}}</h5>
	    <p class="card-text">{{$notes->description}}.</p>
	    <div class="row">
		    <a href="{{route('notes.edit',$notes->id)}}" class="btn btn-primary mx-2">Edit</a>
		    <!-- <form action="{{route('notes.destroy', $notes->id)}}" method="post">  
	          @csrf  
	          @method('DELETE')  
	          <button class="btn btn-danger p-2" type="submit">Delete</button>  
			</form> -->
			<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
  				Delete
			</button>
		</div> 
	  </div>
	</div>

@endforeach

</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="row mx-1">
        <form action="{{route('notes.destroy', $notes->id)}}" method="post">  
	          @csrf  
	          @method('DELETE')  
	          <button class="btn btn-outline-danger p-2" type="submit">Yes</button>  
		</form>

        <button type="button" class="btn btn-outline-success mx-2" data-dismiss="modal">No</button>
		</div>
      </div>
    </div>
  </div>
</div>


@endsection
