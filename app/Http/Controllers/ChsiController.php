<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChsiController extends Controller
{

    // CLIENT
    public function index()
    {
        return view('client.chsi.index');
    }

    public function curhatindex()
    {
        return view('client.chsi.curhatindex');
    }

    public function curhatform()
    {
        return view('client.chsi.curhatform');
    }

    public function curhatsubmit(Request $request)
    {
        // dd($request);

        // submit into database

        return redirect()->route('chsi.index');
    }

    public function curhatchat(Request $request)
    {
        // cek di database

        return view('client.chsi.curhatchat');
    }

    public function curhatfinish()
    {
        return view('client.chsi.curhatfinish');
    }

    public function kritikindex()
    {
        return view('client.chsi.kritikindex');
    }

    public function kritikform($bidang)
    {
        return view('client.chsi.kritikform',[
            'bidang' => $bidang,
        ]);
    }

    public function kritiksubmit()
    {
        // insert data into database

        return view('client.chsi.kritiksubmit');
    }

    public function meditasiindex()
    {
        return view('client.chsi.meditasiindex');
    }

    public function meditasikategori($kategori)
    {
        // load data dari database untuk ditampilkan

        return view('client.chsi.meditasikategori',[
            'data' => null,
            'kategori' => $kategori,
        ]);

    }

    // ADMIN

    public function cekpsdm()
    {
        if(Auth::User()->email == 'psdm'){
            return true;
        }else{
            return false;
        }
    }

    public function psdmindex()
    {
        if(!$this->cekpsdm()){
            return redirect()->route('home');
        }

        return view('chsi.index');
    }

    public function psdmcurhatindex()
    {
        return view('chsi.curhatindex');
    }

    public function psdmcurhatchat($kode)
    {

        return view('chsi.curhatchat',[
            'kode' => $kode,
        ]);
    }

    public function psdmkritikindex()
    {
        return view('chsi.kritikindex');
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
