<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){
        $students=Student::orderBy('id','desc')->paginate(5);
        return view('student.index',compact('students'));
    }//end method


    //add student
    public function addStudent(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:students',
        ],[
            'name.required'=>'name can not be empty',
            'email.required'=>'email can not be empty',
            'email.unique'=>'This email has been already taken',
        ]);

        $student=new Student();
        $student->name=$request->name;
        $student->email=$request->email;

        $student->save();

        return response()->json([
            'status'=>'Student added successfully',
        ]);
    }//end method


    //edit student
    public function editStudent($id){
        $student=Student::find($id);
        return response()->json([
            'student'=>$student
        ]);
    }//end method


     //update student
     public function updateStudent(Request $request){

        $request->validate([
            'update_name'=>'required',
            'update_email'=>'required|unique:students,email,'.$request->update_id,
        ],[
            'update_name.required'=>'name can not be empty',
            'update_email.required'=>'email can not be empty',
            'update_email.unique'=>'This email has been already taken',
        ]);


      $data=Student::find($request->update_id);
      $data->name=$request->update_name;
      $data->email=$request->update_email;
      $data->save();

        return response()->json([
            'status'=>'Student updated successfully',
        ]);
    }//end method


    //delete student
    public function deleteStudent(Request $request){
        $student=Student::find($request->student_id)->delete();

        return response()->json([
            'status'=>'Student deleted successfully',
        ]);
    }//end method


    //pagination
    public function pagination(){
        $students=Student::orderBy('id','desc')->paginate(5);
        return view('student.pagination',compact('students'))->render();
    }//end method


    //search student
    public function search(Request $request){
        $students=Student::where('name','like','%'.$request->search_string.'%')
                 ->orWhere('email','like','%'.$request->search_string.'%')
                 ->orderBy('id','desc')
                 ->paginate(8);

        if(count($students)>0){
            return view('student.pagination',compact('students'))->render();
        } else{
            return response()->json([
                'status'=>'not found',
            ]);
        }
    }//end method
}
