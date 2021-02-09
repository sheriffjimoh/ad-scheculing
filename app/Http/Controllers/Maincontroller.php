<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advert;
use Validator;
use DB;
class Maincontroller extends Controller
{
    //

   public function index($value='')
   {

 $current_time = date('h:i:s', strtotime('-5 minute'));
   $date_minus = date('h:i:s ', strtotime('+30 minute'));

   	$data =  DB::select( DB::raw("SELECT *  FROM adverts WHERE  Time(created_at)  Between  :curr_time  AND 
   	 :date_minus AND status ='on' "), array('curr_time' => $current_time , 'date_minus'=> $date_minus));
   	return view('welcome')->with('data', $data);
   }


    public function create_new($value='')
    {
    $data = Advert::all();

     return  view('create')->with('data', $data);
    }


    public function create(Request $request)
    {
    	
    $validated = Validator::make($request->all(), [
        'file' => 'required',
        'number' => 'required|max:10'
    ]);

    if ($validated->fails()) {
    return redirect()->back()->with(['errors' => $validated->errors()]);
    }else{
      
      $dn = rand(2345,9876);
       $date = date('Y-m-d').'-'.$dn;
       $number = $request->number;
       $extension = $request->file->extension();
       $filename =  $date.'.'.$extension;
       $path = $request->file->storeAs('public/advert_banners', $filename);

       $data = Advert::create(['file' => $filename, 'number' => $number, 'status'=>'on', 'show_date'=>$date,'showed_times' => 0, 'remain_times' =>$number ]);
       if ($data) {
       return redirect()->back()->with('success', 'advert created successfully');
       }else{
       	return redirtect()->back()->with(['errors' => array('0' => 'something went wrong', )]);
       }

    }

    }
}
