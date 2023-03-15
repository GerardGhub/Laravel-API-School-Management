<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sclass;

class SclassController extends Controller
{
    public function Index()
    {
        $sclass = sclass::latest()->get();
        return response()->json($sclass);
    } // End Method

    public function Store(Request $request)
    {
        $validatedData = $request->validate([
            'class_name' => 'required|unique:sclasses|max:25'
        ]);

        Sclass::insert([
            'class_name' => $request->class_name,
        ]);

        return response('Student Class Inserted Successfully');
    } // End Method

    public function Edit($id)
    {
        $class = Sclass::findOrFail($id);
        return response()->json($class);
    }  // End Method

    public function Update(Request $request, $id)
    {
        Sclass::findOrFail($id)->update([
            'class_name' => $request->class_name,
        ]);
        return response('Student Class Updated Successfully');
    } //End Method

    public function Delete($id)
    {
        Sclass::findOrFail($id)->delete();

        return response('Student Class Deleted Successfully');
    }
}
