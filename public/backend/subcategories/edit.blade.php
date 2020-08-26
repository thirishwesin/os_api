@extends('backendtemplate')
@section('title', 'Subcategories')

@section('content')
<div class="container-fluid">
	<h2>Subcategory Edit Form</h2>


	<form method="post" action="{{route('subcategories.update',$subcategory->id)}}" enctype="multipart/form-data">
	@csrf
	@method('PUT')
		
		<div class="form-group row">
			<label for="inputName" class="col-sm-2 col-form-label">Name</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="inputName" name="name" value="{{$subcategory->name}}">
			</div>
			</div>
			


			<div class="form-group row">
			<label for="inputBrand" class="col-sm-2 col-form-label">Category:</label>
			<div class="col-sm-10">
				<select name="category" class="form-control">
				<optgroup value="Choose Category">
					@foreach($categories as $category)
						<option value="{{$category->id}}" @if($category->id == $subcategory->category_id){{'selected'}}
							@endif>
						{{$category->name}}
						
						</option>
						@endforeach
				
				</optgroup>
				
			</select>
			</div>
			
			</div>
			
			<div class="form-group row">
				<input type="submit" name="btnsubmit" value="Update" class="btn btn-primary">
			</div>
		</form>
</div>
@endsection