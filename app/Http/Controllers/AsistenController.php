<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Models\Asisten;

class AsistenController extends Controller
{
    public function index()
    {
        $data['asisten'] = Asisten::orderBy('created_at', 'DESC')->get();
        // dd($data);
        return view('backend.data.asisten.index', $data);
    }


    public function store(Request $request)
    {
        $hashed = Hash::make($request->password1);
        $password2 = $request->password2;
        if (Hash::check($request->password2, $hashed)) {
            $store = new Asisten;
            $store->id_asisten = $request->id_asisten;
            $store->name = $request->name;
            $store->created_at = $request->created_at;
            $store->role = $request->role;
            $store->email = $request->email;
            $store->password = $hashed;

            $photo = $request->photo;
            $namafile = $photo->getClientOriginalName();
            $photo->move('photo', $namafile);
            $store->photo = $namafile;
            $store->save();
            if (!$store) {
                $Response = ['error' => "Data Error"];
            } else {
                $Response = ['success' => "Asisten Data Has Been Saved"];
            }
        } else {
            $Response = ['errror' => "Password Not Same"];
        }
        return response()->json($Response, 200);
    }


    public function edit(Request $request)
    {
        $edit = Asisten::findOrFail($request->id);
        return response()->json($edit);
    }


    public function update(Request $request)
    {

        if ($request->password1) {
            $hashed = Hash::make($request->password1);
            $password2 = $request->password2;
            if (Hash::check($request->password2, $hashed)) {
                $update = Asisten::findOrFail($request->id);
                $update->id_asisten = $request->id_asisten;
                $update->name = $request->name;
                $update->created_at = $request->created_at;
                if ($update->role == "asisten" || $update->role == "pj") {
                    $update->role = $request->role2;
                } else {
                    $update->role = $request->role;
                }

                $update->email = $request->email;
                $update->password = $hashed;

                if ($request->hasFile('photo')) {
                    $path = 'photo/' . $update->photo;
                    if (File::exists($path)) {
                        File::delete($path);
                    }
                    $photo = $request->photo;
                    $namafile = $photo->getClientOriginalName();
                    $photo->move('photo', $namafile);
                    $update->photo = $namafile;
                }
                $update->save();
                if (!$update) {
                    $Response = ['error' => "Data Error"];
                } else {
                    $Response = ['success' => "Asisten Data Has Been Updated"];
                }
            } else {
                $Response = ['errror' => "Password Not Same"];
            }
        } else {
            $update = Asisten::findOrFail($request->id);
            $update->id_asisten = $request->id_asisten;
            $update->name = $request->name;
            $update->created_at = $request->created_at;
            if ($update->role == "asisten" || $update->role == "pj") {
                $update->role = $request->role2;
            } else {
                $update->role = $request->role;
            }
            $update->email = $request->email;

            if ($request->hasFile('photo')) {
                $path = 'photo/' . $update->photo;
                if (File::exists($path)) {
                    File::delete($path);
                }
                $photo = $request->photo;
                $namafile = $photo->getClientOriginalName();
                $photo->move('photo', $namafile);
                $update->photo = $namafile;
            }
            $update->save();
            if (!$update) {
                $Response = ['error' => "Data Error"];
            } else {
                $Response = ['success' => "Asisten Data Has Been Updated"];
            }
        }
        return response()->json($Response, 200);
    }


    public function destroy($id)
    {
        $destroy = Asisten::findOrFail($id);
        $path = 'photo/' . $destroy->photo;
        if (File::Exists($path)) {
            File::Delete($path);
        }
        $destroy->delete();

        return redirect()->back();
    }

    public function editProfile($id)
    {
        $data['profile'] = Asisten::findOrFail($id);

        return view('backend.profile', $data);
    }
}
