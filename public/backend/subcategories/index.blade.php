@extends('backendtemplate')
@section('title', 'Subcategories')

@section('content')
<div class="container-fluid">
	<h2 class="d-inline-block">Subcategory List</h2>
	<a href="{{route('subcategories.create')}}" class="btn btn-success float-right btn-sm">Add New</a>
	<table class="table">
	<thead>
	<tr>	
	<th>No</th>
	
	<th>Name</th>
	
	<th colspan="2">Actions</th>		
	</tr>
	
	</thead>
	<tbody>
	@foreach($subcategories as $subcategory)
		<tr>
		<!-- table column name -->
			<td>{{$subcategory->id}}</td>
			<td>{{$subcategory->name}}
			<a href="" class="d-block">
				<span class="badge badge-success">More</span>
			</a></td>
			
			
			<td>
			<a href="{{route('subcategories.edit',$subcategory->id)}}" class="btn btn-warning">Edit</a>
			<form method="post" action="{{route('subcategories.destroy',$subcategory->id)}}" class="d-inline-block" onsubmit="return confirm('Are You sure?')">
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