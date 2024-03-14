<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Code;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['kode'] = Code::orderBy('created_at', 'desc')
            ->join('users', 'code.id_user', 'users.id')
            ->where('id_user', Auth::id())
            ->select('users.name', 'code.*')
            ->get();

        return view('backend.generator.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kode = Str::random(10);
        $store = new Code;
        $store->id_user = Auth::id();
        $store->code = $kode;
        $store->save();

        if (!$store) {
            $Response = ['error' => 'Error Generating Code'];
        } else {
            $Response = ['success' => "Berhasil", "kode" => $kode];
        }

        return response()->json($Response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
