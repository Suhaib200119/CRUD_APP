<?php

namespace App\Http\Controllers;

use App\Models\Student;
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
        $all_std=Student::all();
        return view("show_std",["all_std" => $all_std]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("add_std");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate(
            [
                "fullName"=>"required",
                "age"=>"required",
                "mobileNumber"=>"required",
                "gpa"=>"required",
            ],
            [
                "fullName.required"=>"يجب عليك إدخال الاسم",
                "age.required"=>"يجب عليك ادخال العمر",
                "mobileNumber.required"=>"يجب عليك رقم الجوال",
                "gpa.required"=>"يجب عليك ادخال المعدل التراكمي",
            ]
        );

        $fullName=$request->fullName;
        $age=$request->age;
        $mobileNumber=$request->mobileNumber;
        $gpa=$request->gpa;
        $level=$request->level;
        $active=$request->active=="on"?1:0;

        $student = new Student();
        $student->fullName=$fullName;
        $student->age=$age;
        $student->mobileNumber=$mobileNumber;
        $student->gpa=$gpa;
        $student->level=$level;
        $student->active=$active;
       $isSaved= $student->save();
        if ($isSaved) {
            // session()->flash("message","تمت عملية الإضافة بنجاح");
            return redirect()->route("students.index");
        }else{
            session()->flash("message","فشلت عملية الإضافة");
            return redirect()->back();
        }




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return response()->view("update_std",["std_data" => $student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {

         
       $request->validate(
        [
            "fullName"=>"required",
            "age"=>"required",
            "mobileNumber"=>"required",
            "gpa"=>"required",
        ],
        [
            "fullName.required"=>"يجب عليك إدخال الاسم",
            "age.required"=>"يجب عليك ادخال العمر",
            "mobileNumber.required"=>"يجب عليك رقم الجوال",
            "gpa.required"=>"يجب عليك ادخال المعدل التراكمي",
        ]
    );
    $std = Student::findOrFail($student->id);

       $std->fullName = $request->get("fullName");
       $std->age = $request->get("age");
       $std-> mobileNumber= $request->get("mobileNumber");
       $std->level = $request->get("level");
       $std-> gpa= $request->get("gpa");
       $std-> active= $request->get("active")=="on"?1:0;
       $isUpdated=$std->update();
       if($isUpdated){
        return redirect()->route("students.index");
       }else{
        session()->flash("message","فشلت عملية التحديث");
        return redirect()->back();
       }

      

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $std=Student::findOrFail($student->id);
        $isDeleted=$std->delete();
        if ($isDeleted) {
            return response()->json([
                "icon"=>"success",
                "title"=>"تمت عملية الحذف بنجاح",
             ],
             200
            );
        }else{
            return response()->json([
                "icon"=>"error",
                "title"=>"فشلت عملية الحذف",
             ],
             400
            );
        }

       
        // return redirect()->back();
    }
}
