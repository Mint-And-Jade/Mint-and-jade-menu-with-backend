<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'categoryName' => 'required',
            'section_id' => 'required'
        ]);
        
        Category::create([
            'section_id' => $request->section_id,
            'name' => $request->categoryName,
            'note' => $request->note
        ]);
    }

    public function delete($id)
    {
        $category = Category::find($id);
        if ($category->items->count() == 0) {
            $category->delete();
        }
    }

    public function update(Request $request)
    {
        $category = Category::find($request->id);

        if ($category) {
            $category->name = $request->name;
            $category->save();
        } else {
            dd('did not find the category');
        }
    }
}
