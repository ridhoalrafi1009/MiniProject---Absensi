<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index()
    {
        $data['kelas'] = Kelas::orderBy('created_at', 'DESC')->get();
        return view('backend.data.kelas.index', $data);
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $store = Kelas::create($data);
        if (!$store) {
            $Response = ['errror' => "Data Error"];
        } else {
            $Response = ['success' => "Data has been saved"];
        }
        return response()->json($Response, 200);
    }


    public function edit(Request $request)
    {
        $edit = Kelas::findOrFail($request->id);
        return response()->json($edit);
    }


    public function update(Request $request)
    {
        $update = Kelas::findOrFail($request->id);
        $update->jurusan = $request->jurusan;
        $update->fakultas = $request->fakultas;
        $update->tingkat = $request->tingkat;
        $update->nama_kelas = $request->nama_kelas;
        $update->save();
        if (!$update) {
            $Response = ['error' => "Data Error"];
        } else {
            $Response = ['success' => "Data has been saved"];
        }
        return response()->json($Response, 200);
    }


    public function destroy($id)
    {
        $destroy = Kelas::findOrFail($id);
        $destroy->delete();

        return redirect()->back();
    }
}
