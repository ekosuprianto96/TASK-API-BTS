<?php

namespace App\Http\Controllers\API;

use App\Models\Item;
use App\Models\CheckList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    public function getItem($checklist_id, $item_id)
    {
        // tabel yang tidak berelasi
        $checklist = CheckList::find($checklist_id);
        $item = Item::find($item_id);
        return response()->json([
            'checklist' => $checklist,
            'item' => $item
        ], 200);
    }
    public function updateItem($checkList_id, $item_id)
    {
        $item = Item::find($item_id);

        $item->checklist_id = $checkList_id;

        return response()->json([
            'message' => 'success'
        ], 200);
    }
    public function destroy($checkList_id, $item_id)
    {
        $item = Item::find($item_id);

        $item->delete();

        return response()->json([
            'message' => 'success'
        ], 200);
    }
    public function rename(Request $requset, $checkList_id, $item_id)
    {
        $item = Item::find($item_id);
        // $item->checklist_id = $checkList_id;
        $$item->name = $requset->name;
        $item->save();

        return response()->json([
            'message' => 'success'
        ], 200);
    }
}
