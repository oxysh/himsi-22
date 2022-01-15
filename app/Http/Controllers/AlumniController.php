<?php

namespace App\Http\Controllers;

use App\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index()
    {
        $data = Alumni::get();
        return view('alumni.index', [
            'data' => $data
        ]);
    }

    public function adminindex()
    {
        $data = Alumni::get();
        return view('alumni.admin.index', [
            'data' => $data
        ]);
    }

    public function create(Request $request)
    {
        Alumni::create([
            'nama' => $request->nama,
            'angkatan' => $request->angkatan,
            'pekerjaan' => $request->pekerjaan,
        ]);

        return true;
    }

    public function update(Request $request)
    {
        $data = Alumni::find($request->id);

        if (!$data) {
            // return not found id
            return false;
        }

        if ($data->nama != $request->nama) {
            $data->nama = $request->nama;
        }

        if ($data->angkatan != $request->angkatan) {
            $data->angkatan = $request->angkatan;
        }

        if ($data->pekerjaan != $request->pekerjaan) {
            $data->pekerjaan = $request->pekerjaan;
        }

        $data->save();

        return true;

    }

    public function remove(Request $request)
    {

        $data = Alumni::find($request->id);
        if (!$data) {
            // return id not found
            return false;
        }

        $data->delete();

        return true;
    }
}
