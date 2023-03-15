<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use Carbon\Carbon;

class SectionController extends Controller
{
    public function SectionStore(Request $request)
    {
        $validatedData = $request->validate([
            'section_name' => 'required|unique:sections|max:25'
        ]);

        Section::insert([
            'class_id' => $request->class_id,
            'section_name' => $request->section_name,
            'created_at' => Carbon::now()
        ]);

        return response('Student Section Inserted Successfully');
    }


    public function Index()
    {
        $section = Section::latest()->get();
        return response()->json($section);
    }

    public function Edit($id)
    {
        $section = Section::findOrFail($id);
        return response()->json($section);
    }


    public function Update(Request $request, $id)
    {
        Section::findOrFail($id)->update([
            'class_id' => $request->class_id,
            'section_name' => $request->section_name,
        ]);
        return response('Student Section Updated Successfully');
    } 

    public function Delete($id)
    {
        Section::findOrFail($id)->delete();

        return response('Student Section Deleted Successfully');
    }
}
