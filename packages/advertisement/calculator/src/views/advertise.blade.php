
@extends('layouts.made')
@section('content')
	
				
				
		<div class="container-fluid">
		<div class="container">
				
		<table id="tablecontent" class="table border">
			<thead>
				<tr>
					<th>SN</th>       
					<th>Company</th>
					<th>Image</th>
					<th>Link</th>
					<th>Start_date</th>
					<th>End_date</th>
					<th>Placement</th>
					<th>Status</th>
					<th>Order</th>
					<th>Action</th>
					
				</tr>
			</thead>
				

			<tbody>
				@foreach($advertises as $key =>  $item)
				<tr>
					<td>{{$key+1}}</td>
					<td>{{$item->company}}</td>
					<td>
						<img src="{{asset('upload/'.$item->image)}}" alt="image" height="100">
					</td>
					<td>{{$item->link}}</td>
					<td>{{$item->start_date}}</td>
					<td>{{$item->end_date}}</td>
					<td>{{$item->placement}}</td>
					<td>{{($item->status)?"Active":"Inactive"}}</td>
					<td>{{$item->order}}</td>
					<td><a href="{{url('advertises/'.$item->id)}}">Show/</a>
					<a href="{{url('advertises/'.$item->id.'/edit')}}">Edit/</a>
					
						<form method="post" action="{{url('advertises/'.$item->id)}}">
							@csrf
							@method('DELETE')
							<input type="submit" value="Delete">
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
				
				
		</table>


			
		</div>
		</div>


			   <script>
						$(document).ready(function() {
    					$('#tablecontent').DataTable( {
        				"scrollX": true
    					} );
						} );
				</script>
@endsection