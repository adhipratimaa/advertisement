@extends('layouts.made')
@section('content')
    
      <form method="post" action="{{url('advertises/'.$advertise->id)}}" enctype="multipart/form-data">
	  @csrf
	  @method('PUT')
			

			<input hidden type="text" value="{{$advertise->id}}"name="id">
			
		 		<div class="container">
				<div class="container-fluid">
				<div class="col-md-10">
					

					<label class="col-2">Company:</label>
						<div class="col-10">
							<input  type="text" name="company" class="form-control form-control-sm" value="{{$advertise->company}}">
						</div>
				


	    	
					<label class="col-2">Image:</label>
						<div class="col-10">
							<img src="{{asset('upload/'.$advertise->image)}}" id="profile-img-tag" height="100">
							<input type="file" name="image" accept="image/*" id="profile-img">  
						</div>



		
					<label class="col-2">Link:</label>
				     	<div class="col-10">
							<input type="string" name="link" class="form-control form-control-sm" value="{{$advertise->link}}">
						</div>


		
		
					<label class="col-2">Start_date:</label>
						<div class="col-10">
							<input type="date"  id="start_date" name="start_date" onchange="enable_end_date()" class="form-control form-control-sm" value="{{$advertise->start_date}}">
						</div>
						<div id="start_date_error"></div>


			
			
					<label class="col-2">End_date:</label>
						<div class="col-10">
							<input type="date" id="end_date" name="end_date" onchange="check_date()"  class="form-control form-control-sm" value="{{$advertise->end_date}}">
						</div>

						<div id="date_error" ></div>




					<label class="col-2">Placement:</label>
						<div class="col-10">
							<select type="text" name="placement">
		    	 				<option value="header" @if ($advertise->placement=="header"){{"selected"}} @endif>header</option>
								<option value="footer" @if ($advertise->placement=="footer"){{"selected"}} @endif>footer</option>
								<option value="sidebar" @if ($advertise->placement=="sidebar"){{"selected"}} @endif>sidebar</option>
								<option value="body" @if ($advertise->placement=="body"){{"selected"}} @endif>body</option></select>
						</div>





					<label class="col-1">Status:</label>
		    			<div class="col-2">
		    	 			<select type="text" name="status">
		    	 				<option value="1"@if ($advertise->status=="1"){{"selected"}} @endif>Active</option>
								<option value="0"@if ($advertise->status=="0"){{"selected"}} @endif>Inactive</option>
							</select>
				
						</div>



					<label class="col-2">Order:</label>
						<div class="col-10">
						<input type="string" name="order" class="form-control form-control-sm" value="{{$advertise->order}}">
					</div>
					<br>


		
		    

            			<div class="col-2">
							<button type="submit" id="btnSubmit" class="btn btn-success">Update</button>
							<button type="reset" class="btn btn-danger">Reset</button>
						</div>
				</div>
				</div>
			
	</form>


<script type="text/javascript">
	function readURL(input) 
		{
			if (input.files && input.files[0])
				{
            		var reader = new FileReader();
            			reader.onload = function (e)
            			{
                			$('#profile-img-tag').attr('src', e.target.result);
            			}
          					reader.readAsDataURL(input.files[0]);
        		}
    	}
    		$("#profile-img").change(function()
    		{
       			readURL(this);
    		});
</script>

<script>
	function check_date()
	{
		var start = document.getElementById('start_date').value; //gets value of start date where "start is variable, "start_date is id"
		var end = document.getElementById('end_date').value; // gets value of end date 
		if (start != '' && end !='')   // if both are not empty 
		{
           if (Date.parse(start) > Date.parse(end))
           {               
               document.getElementById('date_error').innerHTML="ERROR!!! End date should not be smaller than start date";
                         $('#btnSubmit').attr("disabled", true);	//disables submitting data while first filling data mistakenly correcting it and again filling incorrect data 
          
               
            }
 		else if (Date.parse(start) < Date.parse(end))
           {
           	document.getElementById('date_error').innerHTML="";
           	document.getElementById('start_date_error').innerHTML="";
				$('#btnSubmit').removeAttr("disabled"); 
				 //enables submitting form only after filling end date and if end date is greater than start date
           }

        else
        	{
				document.getElementById('date_error').innerHTML="";           
       		}
        }
    }
</script>

<script type="text/javascript">
	function enable_end_date()
	{
		var start = document.getElementById('start_date').value;
		var end = document.getElementById('end_date').value;
		if(start != '' && end!='')
		{
			if (Date.parse(start) > Date.parse(end))
			{
				document.getElementById('start_date_error').innerHTML="ERROR!Start date should not be greater than end date";
				$('#btnSubmit').attr("disabled", true);
			}
				else if (Date.parse(start) < Date.parse(end))
				{
					document.getElementById('start_date_error').innerHTML=""
					document.getElementById('date_error').innerHTML=""
					$('#btnSubmit').removeAttr("disabled"); 

				}
					else
					{
						document.getElementById('start_date_error').innerHTML="";
					}
		}	
	}
</script>








@endsection
