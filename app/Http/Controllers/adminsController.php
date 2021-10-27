<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\role;
use App\Models\Admins;

class adminsController extends Controller
{


    public  function __construct(){

        $this->middleware('adminCheck',['except' => ['create','store','LoginView','login']]);
    }


    /**  http://localhost/group7Laravel/public/Admins
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data  = Admins::select('admins.*','roles.title')->join('roles','roles.id','=','admins.role_id')->get();
     
        return view('admins.index',['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */  
    public function create()
    {
        # Select Roles .... 
       $data = role::get();

       return view('admins.register',['data' => $data]);
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
      $data =  $this->validate($request,[
         "name"     => "required|min:3",
         "email"    => "required|email",
         "password" => "required|min:6|max:10",
         "role_id"  => "required"
       ]);

    # Hash Password 
    $data['password'] = bcrypt($data['password']);

    # Store Data ...  
      $op = Admins::create($data);

      if($op){
          $message = "Data Inserted";
      }else{
          $message = "Error Try Again!!";
      }

    # Set Message To Session .... 
    session()->flash('Message',$message);
    
    return redirect(url('/Admins'));

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

        echo 'Show Function';
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
       # Select Roles .... 
       $Rolesdata = role::get();
       
       # Fetch Admin Data ... 
       $Admindata = Admins::where('id',$id)->get();

      return view('admins.edit',['admin' => $Admindata , 'roles' => $Rolesdata]);

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
        $data =  $this->validate($request,[
            "name"     => "required|min:3",
            "email"    => "required|email",
            "role_id"  => "required"
          ]);


         $op =  Admins::where('id',$id)->update($data);

         if($op){
             $message = "Raw updated";
         }else{
             $message = "Error Try Again!!";
         }

         session()->flash('Message',$message);

         return redirect(url('/Admins'));

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

        $op = Admins::where('id',$id)->delete();

        if($op){
            $message = " Raw Removed";
        }else{
            $message = "Error Try Again !!!";
        }

        session()->flash('Message',$message);
       
        return back();
    }


    

    public function LoginView(){
        return view('admins.login');
    }


    public function login(Request $request){
   
    
        //   dd(request());

        // Logic ...... 
       $data = $this->validate($request,[

        "email" => "required|email",
        "password" => "required|min:6"
       ]);


       if(auth()->guard('admin')->attempt($data)){

        return redirect(url('/Admins'));
       }else{

           return redirect(url('/Admins/Login'));
       }

    }



   public function LogOut(){

    auth()->guard('admin')->logout();

    return redirect(url('/Admins/Login'));
      
   }



}
