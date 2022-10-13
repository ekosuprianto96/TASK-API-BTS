<?php

namespace App\Http\Controllers\API;

use App\Models\CheckList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Contracts\JWTSubject;

class CheckListController extends Controller
{
    public function index()
    {
        $checkList = CheckList::get();

        return response()->json($checkList, 200);
    }
    public function create(Request $request)
    {
        if (isset($request->nama)) {
            $nama = new CheckList();
            $nama->name = $request->nama;
            $nama->save();
            return response()->json([
                'nama' => $nama
            ], 200);
        }
        return response()->json([
            'error' => 'Nama Harus Di Isi'
        ], 400);
    }
    public function destroy($id)
    {
        $checkList = CheckList::find($id);

        $checkList->delete();

        return response()->json([
            'message' => 'Success'
        ], 200);
    }
}
