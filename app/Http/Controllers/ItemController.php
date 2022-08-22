<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function update(Request $request)
    {
        $item = Item::find($request->id);

        if ($item) {
            $item->name = $request->name;
            $item->price = $request->price;
            $item->save();
        } else {
            dd('did not find the item');
        }
    }

    public function add(Request $request)
    {
        $request->validate([
            'itemName' => 'required',
            'price' => 'required',
            'category_id' => 'required'
        ]);

        Item::create([
            'name' => $request->itemName,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);
    }

    public function delete($id)
    {
        Item::find($id)->delete();
    }
}
