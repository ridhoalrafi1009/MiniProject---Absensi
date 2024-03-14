<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Absen;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\Asisten;
use App\Models\Code;

class RiwayatController extends Controller
{
    public function index()
    {
        $data['absen'] = Absen::join('users', 'absensi.id_asisten', 'users.id')
            ->join('kelas', 'absensi.id_kelas', 'kelas.id')
            ->join('materi', 'absensi.id_materi', 'materi.id')
            ->join('code', 'absensi.id_code', 'code.id')
            ->where('users.id', Auth::id())
            ->select('users.id', 'users.name', 'users.id_asisten as idasisten', 'kelas.nama_kelas', 'materi.nama_materi', 'absensi.*')
            ->orderBy('absensi.created_at', 'DESC')
            ->get();
        return view('backend.report.riwayat', $data);
    }

    public function report()
    {
        $data['absen'] = Absen::join('users', 'absensi.id_asisten', 'users.id')
            ->join('kelas', 'absensi.id_kelas', 'kelas.id')
            ->join('materi', 'absensi.id_materi', 'materi.id')
            ->join('code', 'absensi.id_code', 'code.id')
            ->select('users.id', 'users.name', 'users.id_asisten as idasisten', 'kelas.nama_kelas', 'materi.nama_materi', 'absensi.*')
            ->orderBy('absensi.created_at', 'DESC')
            ->get();
        return view('backend.report.report', $data);
    }

    public function search(Request $request)
    {
        $data['absen'] = Absen::join('users', 'absensi.id_asisten', 'users.id')
            ->join('kelas', 'absensi.id_kelas', 'kelas.id')
            ->join('materi', 'absensi.id_materi', 'materi.id')
            ->join('code', 'absensi.id_code', 'code.id')
            ->where('absensi.date', '>=', $request->start)
            ->where('absensi.date', '<=', $request->end)
            ->select('users.id', 'users.name', 'users.id_asisten as idasisten', 'kelas.nama_kelas', 'materi.nama_materi', 'absensi.*')
            ->orderBy('absensi.created_at', 'DESC')
            ->get();
        return view('backend.report.report', $data);
    }
}
