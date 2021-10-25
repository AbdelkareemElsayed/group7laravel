<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use App\Http\Controllers\validator;

class studentController extends Controller
{
    //

   public function create(){
   
    return view('register');

   }



  public function store(Request $request){

        //  echo $request->email;
        //  echo $request->input('name');
        // dd($request->all());
       // dd($request->except(['_token','password']));
      //  dd($request->only(['name','email']));

        //    dd($request->has('gender'));
            //  echo $request->method();
            // dd($request->isMethod('get'));
        //    echo $request->path();
        // echo $request->url(); 

     
    //     $errors = [];
    //     if(empty($request->name)){
    //         $errors['name'] = "Name required";
    //     }


    //     if(empty($request->email)){
    //         $errors['email'] = "Email required";
    //     }

    //  if(count($errors) > 0){

    //     foreach($errors as $val){
    //         echo $val.'<br>';
    //     }
    //  }else{
    //      echo 'Valid Data';
    //  }

    // $obj = new validator;
    // $obj->validate_inputs();
      //echo 'Post Data';



         $this->validate($request,[
           
            "name"     => "required",
            "email"    => "required|email",
            "password" => "required|min:6"

         ]);


           dd('valid Data');

    } 



    public function studentProfile(){

      $stdData = ['name' => "Ahmed" , "age" => 20 , "level" => 3];

     $teacher = "Ali";

    //    return view('profile',["data" => $stdData , "teacher" => $teacher]);       

    //  return view('profile')->with(['data' => $stdData , 'teacher' => $teacher]);   
    
    return view('profile',compact('stdData','teacher'));
    

    

}









}