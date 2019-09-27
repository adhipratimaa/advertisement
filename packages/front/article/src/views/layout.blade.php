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
  background-color: #666;
  padding: 30px;
  text-align: center;
  font-size: 35px;
  color: white;
}

/* Create two columns/boxes that floats next to each other */
nav {
  float: left;
  width: 30%;
  height: 700px; /* only for demonstration, should be removed */
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
  padding: 30px;
  width: 70%;
  background-color: #f1f1f1;
  height: 700px; /* only for demonstration, should be removed */
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

  
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.   </p>
        @foreach ($advertise as $key => $item)

 @if (($item->placement)=="header")
  <div class="col-8">{{$item->company}}</div>
  <a href="{{$item->link}}"><img src="{{asset('upload/'.$item->image)}}" height="100"></a> 
 

     

 @endif


@endforeach
    </div>

    

  


  

</header>

<section>
  <nav>
    
   



@php($item=$advertise->where('placement','sidebar')->sortBy('order'))
@foreach($item as $abc)

<div class="col-8">{{$abc->company}}</div>
<a href="{{$abc->link}}"><img src="{{asset('upload/'.$abc->image)}}" height="100"></a>
@endforeach

   

 </nav>
   
  <article>
   @php($item=$advertise->where('placement','body')->sortBy('order'))
   @foreach ($item as $abc)
   <div class="col-8">{{$abc->company}}</div>
   <a href="{{$abc->link}}"><img src="{{asset('upload/'.$abc->image)}}" height="100"></a>
   @endforeach
    </article>

</section>

<footer>
@php($item = $advertise->where('placement','footer')->first())

 @if ($item)

 <div class="col-8">{{$item->company}}</div> 
 <a href="{{$item->link}}"> <img src="{{asset('upload/'.$item->image)}}" height="100">
</a>  
@endif



 
</footer>

</body>
</html>
