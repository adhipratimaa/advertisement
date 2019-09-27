<?php

namespace Front\Article;


use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Advertisement\Calculator\Advertise;
use File;


class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function page(){

         $advertise=Advertise::all();
        //$adv = Advertise::where('placement','body')->sortBy('order');


         //dd($advertise);

        // dd($advertise);
        return view('view::layout')
      
        ->with ('advertise', $advertise);


        


    }






}