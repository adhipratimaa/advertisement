<?php

namespace Advertisement\Calculator;


use Illuminate\Database\Eloquent\Model;

class Advertise extends Model
{
    protected $fillable=['company','image','link','start_date','end_date','placement','status', 'order'];
         
     // public function getpost()
     //  {
     //  	$data=$this->get();
     //  	return $data;
     //  }   
}
