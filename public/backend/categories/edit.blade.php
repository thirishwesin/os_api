@extends('backendtemplate')
@section('title', 'Categories')

@section('content')
<div class="container-fluid">
	<h2>Category Edit Form</h2>


	<form method="post" action="{{route('categories.update',$category->id)}}" enctype="multipart/form-data">
	@csrf
	@method('PUT')
		
		<div class="form-group row">
			<label for="inputName" class="col-sm-2 col-form-label">Name</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="inputName" name="name" value="{{$category->name}}">
			</div>
			</div>
			<div class="form-group row">
				<label for="inputPhoto" class="col-sm-2 col-form-label">Photo</label>
				<div class="col-sm-10">
					<input type="file" class="form-control" id="inputPhoto" name="photo">
					<img src="{{asset($category->photo)}}" width="100">
					<input type="hidden" name="old_photo_path" value="{{$category->photo}}">
				</div>
			</div>
			


			
			
			
			<div class="form-group row">
				<input type="submit" name="btnsubmit" value="Update" class="btn btn-primary">
			</div>
		</form>
	</div>
</div>
@endsection