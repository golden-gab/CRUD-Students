<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;

class studentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showStudents()
    {
        $students = Student::get()->tojson(JSON_PRETTY_PRINT);
        return response($students,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createStudent(Request $request)
    {
        $student = new Student;
        $student->name = $request->name;
        $student->surname = $request->surname;
        $student->save();

        return response()->json([
            "message"=>"student created"
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showStudent($id)
    {
        if (Student::where('id',$id)->exists()){
            $student = Student::where('id',$id)->get()->tojson(JSON_PRETTY_PRINT);
            return response($student);
        }
        else{
            return response()->Json([
                'message'=>'student not found'
            ],404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStudent(Request $request, $id)
    {
        if(Student::where('id',$id)->exists()){
            $student = Student::find($id);
            $student -> name = is_null($request->name)? $student ->name : $request->name;
            $student -> surname = is_null($request->surname)? $student ->surname : $request->surname;
            $student -> save();

            return response()->json([
                'message'=>'student updated'
            ],200);
        }
        else{
            return response()->json([
                'message'=>'student not found'
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteStudent($id)
    {
        if(Student::where('id',$id)->exists()){
            $student = Student::find($id);
            $student -> delete();

            return response()->json([
                'message'=>'student deleted'
            ]);
        }
        else{
            return response()->json([
                'message'=>'student not found'
            ],404);
        }
    }
}    
