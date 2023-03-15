<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{

    public function Index()
    {
        $subject = Subject::latest()->get();
        return response()->json($subject);
    } // End Method

    public function Edit($id)
    {
        $subject = Subject::findOrFail($id);
        return response()->json($subject);
    }

    public function Update(Request $request, $id)
    {
        Subject::findOrFail($id)->update([
            'class_id' => $request->class_id,
            'subject_name' => $request->subject_name,
            'subject_code' => $request->subject_code,
        ]);
        return response('Student Subject Updated Successfully');
    }



    public function Store(Request $request)
    {

        $validatedData = $request->validate([
            'class_id' => 'required',
            'subject_name' => 'required|unique:subjects|max:25'
        ]);

        Subject::insert([
            'class_id' => $request->class_id,
            'subject_name' => $request->subject_name,
            'subject_code' => $request->subject_code,
        ]);

        return response('Student Subject Inserted Successfully');
    }


    public function Delete($id)
    {
        Subject::findOrFail($id)->delete();

        return response('Student Subject Deleted Successfully');
    }
}
