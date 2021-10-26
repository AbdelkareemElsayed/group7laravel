<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\student;

// use App\Http\Controllers\validator;

class studentController extends Controller
{
    //


   public function display(){

   

      $data =  student::get();
          
     return view('display',['data' => $data]);

    


   }





   public function create(){
   
    return view('register');

   }



  public function store(Request $request){

       $data =   $this->validate($request,[     
            "name"     => "required",
            "email"    => "required|email",
            "password" => "required|min:6"
         ]);


          // student::create(['name' => $request->name , 'password' => $request->password , 'email' => $request->email]);

          // student::create($request->excep(['_token']));
           

          $data['password'] = bcrypt($data['password']);


          $op = student::create($data);

          if($op){
            $message = "Raw Inserted";
          }else{
            $message = "Error Try Again !!!";
          }

           session()->flash('Message',$message);

         return redirect(url('/Create'));

    } 



 
    public function edit($id){

    $data = student::where('id',$id)->get();
     
     return view('edit',['data' => $data]);

    }




    public function update(Request $request){

      $data =   $this->validate($request,[     
           "name"     => "required",
           "email"    => "required|email",
           "id"       => "required"
        ]);

          $op = student::where('id',$data['id'])->update(['email' => $request->email , "name" => $request->name]);

          // $op = student::where('id',$data['id'])->update($request->except(['_token','id']));

          // $op = student::where('id',$data['id'])->update($data);



         if($op){
           $message = "Raw Updated";
         }else{
           $message = "Error Try Again !!!";
         }

          session()->flash('Message',$message);

        return redirect(url('/Display'));

   } 












   public function remove($id){
    

    // student::where([ ['id',$id] , ['flag',1] ]  )->delete();

    // student::where('id',$id)->where('flag',1)->delete();

       $op =  student::where('id',$id)->delete();

       if($op){
         $message = "Raw Removed.";
       }else{
         $message = "Error Try Again !!";
       }

          session()->flash('Message',$message);

          return redirect(url('/Display'));


   }




  public function GetLoginView(){
    return view('login');
  }


  public function Login(Request $request){
    // Logic ..... 

    $data =   $this->validate($request,[     
      "password"  => "required|min:6",
      "email"     => "required|email",
   ]);


        if(auth()->attempt($data)){

          return redirect(url('/Display'));
        }else{
          return redirect(url('/Login'));
        }



  }




  public function logOut(){

        auth()->logout();

        return redirect(url('/Login'));
  }




//    public function studentProfile(){

//     $stdData = ['name' => "Ahmed" , "age" => 20 , "level" => 3];

//    $teacher = "Ali";

//   //    return view('profile',["data" => $stdData , "teacher" => $teacher]);       

//   //  return view('profile')->with(['data' => $stdData , 'teacher' => $teacher]);   
  
//   return view('profile',compact('stdData','teacher'));
  
// }




}