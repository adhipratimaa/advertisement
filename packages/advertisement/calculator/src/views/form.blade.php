@extends('layouts.made')
@section('content')




		<div class="container">
		<div class="container-fluid">
		<div class="col-md-10">
		
			<form  method="post" action="{{url('advertises')}}" enctype="multipart/form-data">
			@csrf
			
			
			
				<label class="col-2">Company:</label>
					<div class="col-10">
						<input  type="text" name="company" class="form-control form-control-sm">
					</div>
					

				<label for="image">Image: </label>
					<input type="file" name="image" accept="image/*" id="profile-img">  
						<img src="" id="profile-img-tag" width="200px" /><br>


				<label class="col-2">Link:</label>
						<div class="col-10">
							<input  type="url" name="link" class="form-control form-control-sm">
						</div>


				<label class="col-2">Start_date:</label>
						<div class="col-10">
							<input id="start_date" onchange="enable_end_date(); check_start_date();" type="date" name="start_date">
						</div>
						<div id="start_date_error" ></div>
						


				<label class="col-2">End_date:</label>
						<div class="col-10">
							<input id="end_date" disabled="true"  onchange="check_date(); CompareDate();"  type="date" name="end_date">
					    </div>
					    <div id="date_error" ></div>
					    <br>



 
				<label for="placement">Placement: </label>
						<select type="text" name="placement">
		    	 			<option value="header">Header</option>
							<option value="footer">Footer</option>
							<option value="sidebar">Sidebar</option>
							<option value="body" selected>Body</option>
						</select>
						<br>


						



				<label class="col-1">Status:</label>
		    			<div class="col-2">
		    	 			<select type="text" name="status" id="status">
		    	 			<option value="1">Active</option>
							<option value="0" selected>Inactive</option>
							</select>
						</div>
						<div id="status_error" ></div>




				<label class="col-2">Order:</label>
						<div class="col-10">
							<input  type="number" name="order" class="form-control form-control-sm">
						</div>
						<br>


						<div class="col-2">
							<button type="submit" id="btnSubmit"  onchange="enable()" class="btn btn-success">Submit</button>
							<button type="reset" class="btn btn-danger">Reset</button>
						</div>
		
		
			
			</form>
		</div>
		</div>
		</div>








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
<!-- //makes image visible when uploaded -->





<script type="text/javascript">
	function enable_end_date()
	{
		var start = document.getElementById('start_date').value;
		if(start)
			document.getElementById('end_date').disabled=false; //enables filling end date, after filling start date and only when start date has value 
		else 
			document.getElementById('end_date').disabled=true; // disables filling end date if start date value is empty
		

	}
</script> 

<script type="text/javascript">
	function enable()
	{
		$('#btnSubmit').attr("disabled", true);
		// if (!empty('#start_date'))
		// 	alert("ok");
	}
</script>





<script>
	function check_date()
	{
		var start = document.getElementById('start_date').value; //gets value of start date where "start is variable, "start_date is id"
		var end = document.getElementById('end_date').value; //gets value of end date
		var current = new Date(); //gets value of current date
		var date = current.getFullYear()+'-'+(current.getMonth()+1)+'-'+current.getDate();//gets value of curren date (year,month,date only)
		
     
		if(Date.parse(start) < Date.parse(end))
        {               
               document.getElementById('start_date_error').innerHTML="";
               document.getElementById('date_error').innerHTML="";
               $('#btnSubmit').removeAttr("disabled"); 
        }



        else if (Date.parse(start) > Date.parse(end))
        {    
				document.getElementById('date_error').innerHTML="ERROR!!! End date should not be smaller than start date";
                         $('#btnSubmit').attr("disabled", true);	//disables submitting data while first filling data mistakenly correcting it and again filling incorrect data 
        }
           
        else if (Date.parse(end) == Date.parse(start))
        {
           		document.getElementById('start_date_error').innerHTML="";
           		document.getElementById('date_error').innerHTML="";
           		//$('#btnSubmit').removeAttr("disabled"); 
           		$('#btnSubmit').attr("disabled",false);

        }

        else
        {
           		document.getElementById('date_error').innerHTML="";
           		document.getElementById('date_error').innerHTML="";
        }





        if (Date.parse(end) < Date.parse(date))
        {
           		document.getElementById('status_error').innerHTML="Sorry!Your Advertisement date has expried";
           		$('#status').attr("disabled",true);
        }

            
        else
        {
            	document.getElementById('status_error').innerHTML="";
            	$('#status').attr("disabled",false);
        }
	}
</script>







<script>
	function check_start_date()
	{
		var start = document.getElementById('start_date').value; //gets value of start date where "start is variable, "start_date is id"
		var end = document.getElementById('end_date').value; // gets value of end date 
		
		
		if (Date.parse(start) < Date.parse(end))
        {               
               document.getElementById('start_date_error').innerHTML="";
               document.getElementById('date_error').innerHTML="";
               $('#btnSubmit').attr("disabled",false);
        }

        else if (Date.parse(start)==Date.parse(end))
        {
           	
           		document.getElementById('date_error').innerHTML="";
           		document.getElementById('start_date_error').innerHTML-"";

           		$('#btnSubmit').attr("disabled", false);
        }


		else if (Date.parse(start) > Date.parse(end))
        {               
               document.getElementById('start_date_error').innerHTML="ERROR!!! Start date should not be greater than end date";
                         $('#btnSubmit').attr("disabled", true);	//disables submitting data while first filling data mistakenly correcting it and again filling incorrect data 
          
        }
            

        else
        {
           	document.getElementById('start_date_error').innerHTML="";
			// 	$('#btnSubmit').removeAttr("disabled",true); 
			// 	 enables submitting form only after filling end date and if end date is greater than start date
           

        }
    }
</script>


@endsection







   
				

						
						

						

						


						




						


						



			
					



	
				
		


		
				


			
				


				


					
			



		

		
		   
		    	



				
				
			
