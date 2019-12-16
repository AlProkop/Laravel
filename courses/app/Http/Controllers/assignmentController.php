<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\assignments;

class assignmentController extends Controller
{
    function getAssignments(Request $request){
        return response()->json(assignments::all());
    }
    
    function addAssignment(Request $request){  
        $assignment = new assignments();
        $assignment->name = $request->input('name');
        $assignment->description = $request->input('description');
        $assignment->state = $request->input('state');
        $assignment->create_date = $request->input('create_date');
        $assignment->due_date = $request->input('due_date');
        $assignment->course_id_FK = $request->input('course_id_FK');
        
        $assignment->save();
        return $assignment;
    }
    
    function updateAssignment($id, Request $request){
        $assignment = \App\assignments::find($id);
        $assignment->description = $request->input('description');
        $assignment->state = $request->input('state');
        $assignment->create_date = $request->input('create_date');
        $assignment->due_date = $request->input('due_date');
        $assignment->save();
        return $assignment;
    }
    
    function deleteAssignment($id){
        $assignment = \App\assignments::find($id);
        $assignment->delete();
        return $assignment;
    }
    
}