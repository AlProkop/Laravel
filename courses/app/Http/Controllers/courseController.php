<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\courses;
class courseController extends Controller
{
    function addCourse(Request $request){
      
        $course = new courses();
        $course->name = $request->input('name');;
        $course->start_date = $request->input('start_date');
        $course->end_date = $request->input('end_date');
        $course->save();
        return $course;
    }
    
    function getCourses(Request $request){
        return response()->json(courses::all());
    }
    
     function updateCourse($id, Request $request){
        $course = \App\courses::find($id);
        $course->name = $request->input('name');     
        $course->start_date = $request->input('start_date');
        $course->end_date = $request->input('end_date');
        $course->save();
        return $course;
    }
    
}
