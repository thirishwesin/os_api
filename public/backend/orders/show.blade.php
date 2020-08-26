@extends('backendtemplate')
@section('title', 'Items')

@section('content')
<div class="container-fluid">
	<h2 class="text-center">Product Details</h2>

	<div class="row mt-5 p-3">
		<div class="col-md-4">
			<img src="{{asset($item->photo)}}" class="img-fluid">
		</div>
		<div class="col-md-8">
			<table class="table">
				<tr>
					<td>Product Name:</td>
					<td>{{$item->name}}</td>
				</tr>
				<tr>
					<td>Product Code:</td>
					<td>{{$item->codeno}}</td>
				</tr>
				<tr>
					<td>Product Price</td>
					<td>{{$item->price}}</td>
				</tr>
				<tr>
					<td>Product Description</td>
					<td>{{$item->description}}</td>
				</tr>
			</table>
		</div>
	</div>
</div>
@endsection