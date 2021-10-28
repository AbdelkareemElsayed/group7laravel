<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\blog;
use Validator;

class blogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = blog::select('id','title','content')->get();

      return response()->json(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       
          $validator =   Validator::make($request->all(),[
            "title"   => "required|min:5",
            "content" => "required|min:100",
            "image"   => "required|image|mimes:png,jpg,gif" 
            ]);

            if($validator->fails()){

                return response()->json(['errors' => $validator->errors()]);
            }else{


              $finalName = time().rand().'.'.$request->image->extension();

             
              $request->image->move(public_path('blogImages'),$finalName);


              $op =  blog::create(["title" => $request->title , "content" => $request->content,"image" => $finalName ]);

              if($op){
                  $message = "Data Inserted";
              }else{
                  $message = "Error Try Again !!";
              }

              
              return response()->json(['Message' => $message]);
            }








    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator =   Validator::make($request->all(),[
            "title"   => "required|min:5",
            "content" => "required|min:100",
            "image"   => "nullable|image|mimes:png,jpg,gif" 
            ]);

            if($validator->fails()){

                return response()->json(['errors' => $validator->errors()]);
            }else{


                # To fetch Raw Data .... 
                $data = blog::find($id);    //   where('id',$id)->get();


              if($request->has('image') && !empty($request->image)){
            
                $finalName = time().rand().'.'.$request->image->extension();  
                $request->image->move(public_path('blogImages'),$finalName);


               if(!empty($data->image)) {
               if(file_exists(public_path('blogImages/'.$data->image))){
                unlink(public_path('blogImages/'.$data->image));
               }
             }

            }else{
                $finalName  = $data->image;
            }

              $op =  blog::where('id',$id)->update(["title" => $request->title , "content" => $request->content,"image" => $finalName ]);

              if($op){
                  $message = "Data Updated";
              }else{
                  $message = "Error Try Again !!";
              }

              
              return response()->json(['Message' => $message]);
            }





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         # To fetch Raw Data .... 
         $data = blog::find($id);  

        $op =  blog::where('id',$id)->delete();

        if($op){


            if(!empty($data->image)) {
                if(file_exists(public_path('blogImages/'.$data->image))){
                 unlink(public_path('blogImages/'.$data->image));
                }
              }


            $message = "Data deleted";
        }else{
            $message = "Error Try Again !!";
        }

        
        return response()->json(['Message' => $message]);
      

    }



}
