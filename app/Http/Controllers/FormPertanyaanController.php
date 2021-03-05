<?php

namespace App\Http\Controllers;

use App\FormPertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FormPertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        FormPertanyaan::create([
            'form_id'       => $request->formid,
            'tipe'          => $request->tipe,
            'pertanyaan'    => $request->pertanyaan,
            'opsi'          => $request->opsi,
        ]);

        Session::flash('success','Sukses menambah pertanyaan');

        return redirect()->back();
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
    public function update(Request $request)
    {
        $f = FormPertanyaan::find($request->questid);

        if($f->tipe != $request->tipe)
        {
            $f->tipe = $request->tipe;
        }

        if($f->pertanyaan != $request->pertanyaan)
        {
            $f->pertanyaan = $request->pertanyaan;
        }

        if($f->opsi != $request->opsi)
        {
            $f->opsi = $request->opsi;
        }

        $f->save();

        return redirect()->back()->with('success','Anda berhasil mengubah pertanyaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FormPertanyaan::find($id)->delete();
        Session::flash('success','Sukses menghapus pertanyaan');
        return redirect()->back();
    }
}
