<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;

class MateriController extends Controller
{
    public function index()
    {
        $data['materi'] = Materi::orderBy('created_at', 'DESC')->get();
        return view('backend.data.materi.index', $data);
    }

    public function store(Request $request)
    {
        $store = Materi::create($request->all());

        if (!$store) {
            $Response = ['errror' => "Data Error"];
        } else {
            $Response = ['success' => "Data has been saved"];
        }
        return response()->json($Response, 200);
    }


    public function edit(Request $request)
    {
        $edit = Materi::findOrFail($request->id);

        return response()->json($edit);
    }


    public function update(Request $request)
    {
        $update = Materi::findOrFail($request->id);
        $update->nama_materi = $request->nama_materi;
        $update->save();
        if (!$update) {
            $Response = ['errror' => "Data Error"];
        } else {
            $Response = ['success' => "Data has been updated"];
        }
        return response()->json($Response, 200);
    }


    public function destroy($id)
    {
        $destroy = Materi::findOrFail($id);
        $destroy->delete();

        return redirect()->back();
    }
}
