@extends('backendtemplate')
@section('title', 'Items')

@section('content')
<div class="container-fluid">
	<h2 class="d-inline-block">Item List</h2>
	<a href="{{route('items.create')}}" class="btn btn-success float-right btn-sm">Add New</a>
	<table class="table">
	<thead>
	<tr>	
	<th>No</th>
	<th>CodeNo</th>	
	<th>Name</th>
	<th>Price</th>
	<th colspan="2">Actions</th>		
	</tr>
	
	</thead>
	<tbody>
	@foreach($items as $item)
		<tr>
		<!-- table column name -->
			<td>{{$item->id}}</td>
			<td>{{$item->codeno}}
			<a href="{{route('items.show' ,$item->id)}}" class="d-block">
				<span class="badge badge-success"><i class="fas fa-eye"></i></span>
			</a>
			<a href="#detailModal" class="detailBtn" data-photo="{{$item->photo}}" data-name="{{$item->name}}" data-codeno="{{$item->codeno}}" data-price="{{$item->price}}" data-description="{{$item->description}}"><span class="badge badge-success"><i class="fas fa-eye"></i></span></a>


				</td>
			
			<td>{{$item->name}}</td>
			<td>{{$item->price}}</td>
			<td>
			<a href="{{route('items.edit',$item->id)}}" class="btn btn-warning">Edit</a>
			<form method="post" action="{{route('items.destroy',$item->id)}}" class="d-inline-block" onsubmit="return confirm('Are You sure?')">
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



<!-- Detail Modal -->
<div class="modal" id="detailModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title name"></h1>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<img src="" class="img-fluid itemImg">
					</div>
					<div class="col-md-6 content"></div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-success" data-dismiss="modal"> Close</button>
			</div>
		</div>
	</div>
</div>
@endsection



@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		$('.detailBtn').click(function(){
			var photo =$(this).data('photo');
			var name =$(this).data('name');
			var codeno=$(this).data('codeno');
			var price=$(this).data('price');
			var description=$(this).data('description');

			$('.itemImg').attr('src',photo);
			$('.name').attr(name);
			$('.content').html(`<p>CodeNo :${codeno}</p>
									<p>Price:	${price}</p>
									<p>Description:	${description}</p>`);
			$('#detailModal').modal('show');
		})
	})
</script>
@endsection