@extends('backendtemplate')
@section('title', 'Items')

@section('content')
<div class="container-fluid">
	<h2 class="d-inline-block">Brand List</h2>
	<a href="{{route('brands.create')}}" class="btn btn-success float-right btn-sm">Add New</a>
	<table class="table">
	<thead>
	<tr>	
	<th>No</th>
	
	<th>Name</th>
	
			
	</tr>
	
	</thead>
	<tbody>
	@foreach($brands as $brand)
		<tr>
		<!-- table column name -->
			<td>{{$brand->id}}</td>
			<td>{{$brand->name}}
			<a href="" class="d-block">
				<span class="badge badge-success">More</span>
			</a></td>
			
			
			
			<td>
			<a href="{{route('brands.edit',$brand->id)}}" class="btn btn-warning">Edit</a>
			<form method="post" action="{{route('brands.destroy',$brand->id)}}" class="d-inline-block" onsubmit="return confirm('Are You sure?')">
			@csrf
			@method('Delete')
				<input type="submit" name="btn-submit" value="Delete" class="btn btn-danger">
			</form>
			
			</td>
			
		</tr>
		@endforeach
	</tbody>
	</table>
</div>
@endsection