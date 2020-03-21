<?php

namespace App\Http\Controllers;
use DB;

use App\Form_Data;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function myform()              
    {                                     
       return view("form.form");        
    }


       //  submitmyform Function Starts
     public function index(Request $request)                 
      { 
        // validation starts
         $this->validate($request,[                                         
            "name"=>"required",
            "email"=>"required|email|min:8|unique:form__datas,email",
            "age"=>"required"
            ],[
                "name.required"=>"Name Should be filled",
                "email.min"=>" Email length should be more than 8",
                "email.email"=>"Enter a Valid E-mail"
            ]);  
                 // validation ends
         
                //Database insertion code starts
            $name = $request->input('name');                                  
            $email = $request->input('email');
            $age = $request->input('age');
            $data=array('name'=>$name,"email"=>$email,"age"=>$age);
            DB::table('form__datas')->insert($data);                            
               //Database insertion code ends 
            {
            $Form_Data = Form_Data::all()->toArray();
                return view('index', compact('Form_Data')); 

               die("Form Submitted Successfully");
           }
              }


           
            // public function view()
            // {                
                 
            //       $Form_Data = Form_Data::all()->toArray();
            //     return view('index', compact('Form_Data'));     
                 
            // }
     
}
