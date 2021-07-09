<?php

namespace App\Http\Controllers;

use App\Models\Group;

use Illuminate\Http\Request;

class StudyGroupController extends Controller
{
    //
    public function listGroups(){
        return view('class.classlist', ['group_details' => Group::latest()->with('creator')->get(), ]);
    }
    public function createGroup(){
        return "Group Created";
    }
}
