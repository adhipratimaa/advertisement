@extends('layouts.app')
@section('content')

		<table class="table border">
			<thead>
				<tr>
					<th>SN</th>       
					<th>provider</th>
					<th>image</th>
					<th>link</th>
					<th>email</th>
					<th>start_date</th>
					<th>end_date</th>
					<th>place</th>
					<th>status</th>
					
				</tr>
			</thead>
			<tbody>
			
					@if($post_data)
					
					@foreach($post_data as $key=> $detail) 


					<tr>
						<td>{{$key+1}}</td>
						<td>{{$detail->name}}</td>
						<td><img src="{{asset('uploads/'.$detail->image)}}" alt="image" height="100"></td>
						<td>{{$detail->address}}</td>
						<td>{{$detail->email}}</td>
						<td>{{$detail->number}}</td>
						<td>{{$detail->country}}</td>
						<td>{{$detail->district}}</td>
						<td>{{$detail->city}}</td>
						<td>{{$detail->status}}</td>
						<td>{{$detail->dob}}</td>
						<td>{{$detail->gender}}</td>
						<td>{{$detail->socialid}}</td>
						<td>{{$detail->social}}</td>
						<td>{{($detail->license)?"Yes":"No"}}</td>
						<td>{{($detail->vehicle)?"Yes":"No"}}</td>
						<td><a href= "{{url('/edit/'.$detail->id)}}">Edit</a></td>
						<td><a href="{{url('/delete/'.$detail->id)}}">Delete</a></td>
						
					</tr>
					@endforeach
					@endif


				
				
			</tbody>
			</table>
@endsection

