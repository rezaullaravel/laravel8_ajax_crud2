<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeacherController extends Controller
{
    public function show(){
        $teachers=Teacher::orderBy('id','desc')->get();
        return view('teacher.show',compact('teachers'));
    }//end method


    //store teacher
    public function store(Request $request){
          $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'image'=>'required'
          ]);


          if($request->file('image')){
            $image=$request->file('image');
            $imageName=rand().'.'.$image->getClientOriginalName();

              $image->move('upload/',$imageName);

              $imageUrl='upload/'.$imageName;
          }


          $teacher=new Teacher();

          $teacher->name=$request->name;
          $teacher->phone=$request->phone;
          $teacher->image= $imageUrl;
          $teacher->save();


          return response()->json([
            'status'=>'Teacher added successfully',
          ]);
    }//end method



    //edit teacher
    public function edit($id){
        $teacher=Teacher::find($id);

        return response()->json([
            'teacher'=>$teacher,
        ]);
    }//end method


    //update teacher
    public function update(Request $request,$id){

         $request->validate([
            'name'=>'required',
            'phone'=>'required',
          ]);

               $teacher=Teacher::find($id);
               $oldImage=$teacher->image;

               if($request->file('image')){
                if(File::exists($oldImage)){
                    File::delete($oldImage);
                }
            $image=$request->file('image');
            $imageName=rand().'.'.$image->getClientOriginalName();

              $image->move('upload/',$imageName);

              $imageUrl='upload/'.$imageName;

               $teacher->image=$imageUrl;
          }

           $teacher->name=$request->name;
          $teacher->phone=$request->phone;
          $teacher->save();

        return response()->json([
            'status'=>'Teacher info updated successfully',
        ]);
    }//end method


    //delete teacher
    public function delete($id){
        $teacher=Teacher::find($id);
       
        if(File::exists($teacher->image)){
                    File::delete($teacher->image);
                }
        $teacher->delete();

         return response()->json([
            'status'=>'Teacher info deleted successfully',
        ]);
    }//end method











}//end class
