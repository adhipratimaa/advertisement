

<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Template</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
header {
  background-color: black;
  padding: 30px;
  text-align: center;
  font-size: 35px;
  color: white;
}

/* Create two columns/boxes that floats next to each other */
nav {
  float: left;
  width: 30%;
  height: 300px; /* only for demonstration, should be removed */
  background: #ccc;
  padding: 20px;
}

/* Style the list inside the menu */
nav ul {
  list-style-type: none;
  padding: 0;
}

article {
  float: left;
  padding: 20px;
  width: 70%;
  background-color: #f1f1f1;
  height: 300px; /* only for demonstration, should be removed */
}

/* Clear floats after the columns */
section:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the footer */
footer {
  background-color: #777;
  padding: 10px;
  text-align: center;
  color: white;
}

/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
  nav, article {
    width: 100%;
    height: auto;
  }
}
</style>
</head>
<body>

<h2>CSS Layout Float</h2>


<header>
<h2>

		@if(($advertise->placement)=="header")
		
    <div class="col-10">
    	<div class="class">{{$advertise->company}}</div>
    	<img src="{{asset('upload/'.$advertise->image)}}"  height="300">
    	<div class="col-9"><a href="{{$advertise->link}}" target="_banner">{{$advertise->link}}</a></div>
    	
    	
    	
    
    	
    </div>

		@endif
	
  	</h2>
</header>

<section>
  <nav>
     @if(($advertise->placement)=="sidebar")
		
    <div class="col-10">
    	<div class="class">{{$advertise->company}}</div>
    	<img src="{{asset('upload/'.$advertise->image)}}"  height="50">
    	<div class="c0l-9">{{$advertise->link}}</div>
    	<div class="col-9">{{$advertise->start_date}}</div>
    	<div class="col-9">{{$advertise->end_date}}</div>
    	{{$advertise->placement}}
    	{{$advertise->order}}
    </div>

		@endif
  </nav>
  
  <article>
    @if(($advertise->placement)=="body")
		
    <div class="col-10">
    	<div class="class">{{$advertise->company}}</div>
    	<img src="{{asset('upload/'.$advertise->image)}}"  height="100">
    	<div class="col-9"><a href="" target="_banner">{{$advertise->link}}</a></div>
    	
    </div>

		@endif

  </article>
</section>

<footer>
<h2>
		@if(($advertise->placement)=="footer")
		
    <div class="col-10">
    	<div class="class">{{$advertise->company}}</div>
    	<img src="{{asset('upload/'.$advertise->image)}}"  height="50">
    	<div class="c0l-9">{{$advertise->link}}</div>
    	<div class="col-9">{{$advertise->start_date}}</div>
    	<div class="col-9">{{$advertise->end_date}}</div>
    	{{$advertise->placement}}
    	{{$advertise->order}}
    </div>

		@endif
	
  	</h2>
</footer>

</body>
</html>
