<?php

namespace App\Http\Controllers;

use App\Models\section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'sectionName' => 'required',
        ]);

        section::create([
            'name' => $request->sectionName,
        ]);
    }


    public function delete($id)
    {
        $section = Section::find($id);
        if ($section->categories->count() == 0) {
            $section->delete();
        }
    }

    public function update(Request $request)
    {
        $section = Section::find($request->id);

        if ($section) {
            $section->name = $request->name;
            $section->save();
        } else {
            dd('did not find the section');
        }
    }
}
