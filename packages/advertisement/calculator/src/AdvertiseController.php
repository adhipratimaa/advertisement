<?php

namespace Advertisement\Calculator;


use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use File;


class AdvertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

  
      $adv=Advertise::all();
       
        return view('advertise::advertise')->with('advertises', $adv);
      

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // //dd('dfadfa');


        return view ('advertise::form');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request);
        //dd($request->image);
         if ($request->image)
         {
            $path = Public_path().'/upload';
            ////dd($path);
            if (!File::exists($path))
             {
                 File::makeDirectory($path, 0777, true, true);
             }
             $file_name="Image-".date('Ymdhis').rand(0,1234).".".$request->image->getClientOriginalExtension();
             $success=$request->image->move($path,$file_name);
        }
         
        $data=$request->except('_token');
        $data['image']=$file_name;
        // //dd($request);

        $advertise =new Advertise();
        //$data['image'] = $file_name;
        $advertise->fill($data);


        $advertise->save($data);
        return redirect('advertises');
    }





        
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Advertise  $advertise
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
          
        
         

    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Advertise  $advertise
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $advertise=Advertise::find($id);
        return view('advertise::editadvertise')->with('advertise',$advertise);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Advertise  $advertise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
       $add=Advertise::find($request->id);
        //dd($request->id);
        //$socialid = $_POST['socialid'];
        //$socialid = implode(", ", $socialid);
        
        $data= $request->except('_token','submit');
            //dd($request->image);
        if($request->image){
        $path= public_path(). '/upload';
        //dd($path);
        if(!File::exists($path)){
            File::makeDirectory($path, 0777, true, true);

        }

        //$file = $request->file('Picture');
        //$destinationPath = 'public/img/';
        //$originalFile = $file->getClientOriginalName();
        //$file->move($destinationPath, $originalFile);

        $file_name = "Image-".date('Ymdhis').rand(0, 1234).".".$request->image->getClientOriginalName();
        //dd($file_name);
        $success = $request->image->move($path, $file_name);
        $data['image']=$file_name;    
    }
          
          
        
        //dd($data);
       
        
        $add->fill($data);
        $add->save();
        
          return redirect('advertises')->with ('request', $add);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Advertise  $advertise
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // //dd($id);
       // //dd($request->id);
        // $advertise=Advertise::find($request->id);
        $advertise=Advertise::find($id);
        $advertise->delete();

        return redirect('advertises');
    }

   

    public function show(Request $request ,$id)
    {       

        // echo "show";
        // dd($advertise);
        // dd($request);
                $advertise=Advertise::find($id);
        return view('advertise::showadvertise')
        ->with('advertise',$advertise)

        ;
    }
}
