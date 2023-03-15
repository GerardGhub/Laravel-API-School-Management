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
    }

    public function Store(Request $request) {

        $validatedData = $request->validate([
            'class_name' => 'required|unique:sclasses|max:25'
        ]);

        Sclass::insert([
            'class_name' => $request->class_name,
        ]);
        
        return response('Student Class Inserted Successfully');
    }
}
