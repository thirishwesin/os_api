@extends('backendtemplate')
@section('title', 'Items')

@section('content')
<div class="container-fluid">
	<h2>Item Create Form</h2>
	{{-- Must show related input errors --}}
	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	<form method="post" action="{{route('items.store')}}" enctype="multipart/form-data">
	@csrf
		<div class="form-group row">
			<label for="inputCodeNo" class="col-sm-2 col-form-label">CodeNo</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="inputCodeNo" name="code_no">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputName" class="col-sm-2 col-form-label">Name</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="inputName" name="name">
			</div>
			</div>
			<div class="form-group row">
				<label for="inputPhoto" class="col-sm-2 col-form-label">Photo</label>
				<div class="col-sm-10">
					<input type="file" class="form-control" id="inputPhoto" name="photo">
				</div>
			</div>
			<div class="form-group row">
				<label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" id="inputPrice" name="price">
				</div>
			</div>
			<div class="form-group row">
				<label for="inputDiscount" class="col-sm-2 col-form-label">Discount</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" id="inputDiscount" name="discount" value="0">
				</div>
			</div>
			<div class="form-group row">
				<label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
				<div class="col-sm-10">
					<textarea class="form-control" name="description" id="inputDescription"></textarea>
				</div>
			</div>
			<div class="form-group row">
			<label for="inputBrand" class="col-sm-2 col-form-label">Brand:</label>
			<div class="col-sm-10">
				<select name="brand" class="form-control">
				<optgroup value="Choose Brand">
					
						@foreach($brands as $brand)
						<option value="{{$brand->id}}">
						{{$brand->name}}
						</option>
						@endforeach
					</option>
				
				</optgroup>
				
			</select>
			</div>
			
			</div>
			<div class="form-group row">
			<label for="inputSubcategory" class="col-sm-2 col-form-label">Subcategory:</label>
			<div class="col-sm-10">
				<select name="subcategory" class="form-control">
				<optgroup value="Choose Subcategory">
					@foreach($subcategories as $subcategory)
						<option value="{{$subcategory->id}}">
						{{$subcategory->name}}
						</option>
						@endforeach
				
				</optgroup>
				
			</select>
			</div>
			
			</div>
			<div class="form-group row">
				<input type="submit" name="btnsubmit" value="Save" class="btn btn-primary">
			</div>
		</form>
	</div>
	@endsection