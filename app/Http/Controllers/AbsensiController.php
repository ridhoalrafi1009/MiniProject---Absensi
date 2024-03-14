<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Absen;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\Asisten;
use App\Models\Code;


class AbsensiController extends Controller
{
    public function store(Request $request)
    {
        $idLogin = Auth::id();
        $getIdAsisten = $request->id_asisten;
        $getCode = $request->code;
        $getIdMateri = $request->materi;
        $getIdKelas = $request->kelas;
        $getPeran = $request->teaching_role;
        $getDuration = $request->duration;

        //check id asisten
        $getMatchId = User::where('id_asisten', $getIdAsisten)->first();
        if ($idLogin == $getMatchId->id) {
            //check code
            $getMatchCode = Code::where('code', $getCode)->first();
            if ($getCode == $getMatchCode->code && (empty($getMatchCode->id_user_get))) {
                //check code absen tidak sama dengan yg dibuat sendiri
                if ($getMatchCode->id_user != $idLogin) {
                    $store = new Absen;
                    $store->id_kelas = $getIdKelas;
                    $store->id_materi = $getIdMateri;
                    $store->id_asisten = $idLogin;
                    $store->teaching_role = $getPeran;
                    $store->duration = $getDuration;

                    $today = Carbon::now("GMT+7")->toDateString();
                    $timeNow = Carbon::now("GMT+7")->toTimeString();

                    $store->date = $today;
                    $store->start = $timeNow;
                    $store->id_code = $getMatchCode->id;
                    $store->save();

                    $getMatchCode->id_user_get = $idLogin;
                    $getMatchCode->save();
                    if (!$store) {
                        $Response = ['error' => "Absen error"];
                    } else {
                        $Response = ['success' => "Absen Success"];
                    }
                } else {
                    $Response = ['error' => "Absen error"];
                }
            } else {
                $Response = ['error' => "Absen error"];
            }
        } else {
            $Response = ['error' => "Absen error"];
        }

        return response()->json($Response, 200);
    }


    public function update(Request $request)
    {
        $carbon = Carbon::now('GMT+7');
        $today = $carbon->toDateString();
        $idLogin = Auth::id();
        $cekAbsen = Absen::where('id_asisten', $idLogin)->where('date', $today)->where('end', null)->first();

        $masuk = $cekAbsen->start;
        $keluar = Carbon::now("GMT+7")->toTimeString();
        $cekAbsen->end = $keluar;
        $hasil = $carbon->diffInMinutes($masuk);
        $cekAbsen->duration = $hasil;
        $cekAbsen->save();

        if (!$cekAbsen) {
            $Response = ['error' => "Error Saat simpan clockout"];
        } else {
            $Response = ['success' => "Berhasil Clockout"];
        }

        return response()->json($Response, 200);
    }
}
