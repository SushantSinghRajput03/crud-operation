<?php

namespace App\Http\Controllers;
use DB;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $students = Student::latest()->paginate(2);
        return view('student.index', compact('students'))->with('i', (request()->input('page', 1) - 1) * 5);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[                                         
            "name"=>"required",
            "email"=>"required|email|min:8|unique:students,email",
            "age"=>"required",
            'image'  =>  'required|image|max:2048'
            ],[
                "name.required"=>"Name Should be filled",
                "email.min"=>" Email length should be more than 8",
                "email.email"=>"Enter a Valid E-mail"
            ]);  
                 // validation ends
         $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
         
                //Database insertion code starts
            $student = new Student([
                 'name'    =>  $request->get('name'),
                 'email'   =>  $request->get('email'),
                 'age'     =>  $request->get('age'),
                 'image'   =>  $new_name
             ]);
                  $student->save();


            // $name = $request->input('name');                                  
            // $email = $request->input('email');
            // $age = $request->input('age');
            // $data=array('name'=>$name,"email"=>$email,"age"=>$age);
            // DB::table('students')->insert($data)->orderBy('id','desc');                            
               //Database insertion code ends 

            return redirect()->route('student.index')->with('success', 'Data Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('student.edit', compact('student', 'id'));
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
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
        $this->validate($request, [
            'name'    =>  'required',
            'email'   =>  'required',
            'age'     =>    'required',
            'image'   =>  'image|max:2048'
        ]);
        \File::delete(public_path() . '/images', $image_name);
        $image_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $image_name);
         }
         else
         {
            $this->validate($request, [
            'name'    =>  'required',
            'email'   =>  'required',
            'age'     =>    'required',
           
        ]);
        }
        $student = Student::find($id);
        $student->name = $request->get('name');
        $student->email = $request->get('email');
        $student->age = $request->get('age');
        $student->image =  $image_name ;
        $student->save();
        return redirect()->route('student.index')->with('success', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('student.index')->with('success', 'Data Deleted');
    }
}
