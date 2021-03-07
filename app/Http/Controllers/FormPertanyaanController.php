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
            'mandatory'     => $request->mandatory == "true" ? true : false,
        ]);

        Session::flash('success', 'Sukses menambah pertanyaan');

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

        if ($f->tipe != $request->tipe) {
            $f->tipe = $request->tipe;
        }

        if ($f->pertanyaan != $request->pertanyaan) {
            $f->pertanyaan = $request->pertanyaan;
        }

        if ($f->opsi != $request->opsi) {
            $f->opsi = $request->opsi;
        }

        if ($f->mandatory != ($request->mandatory == 'true')) {
            $f->mandatory = $request->mandatory == 'true' ? true : false;
        }

        $f->save();

        return redirect()->back()->with('success', 'Anda berhasil mengubah pertanyaan');
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
        Session::flash('success', 'Sukses menghapus pertanyaan');
        return redirect()->back();
    }

    public function sort(Request $request)
    {
        if($request->questid == null || $request->number == null) {
            return redirect()->back()->with('errorBitly','Kalo mau ganti urutan, pilih dulu bos opsinya');
        }
        $p = FormPertanyaan::with(['form', 'form.pertanyaan'])->find($request->questid);

        if($p->sorting == (int)$request->number){
            return redirect()->back()->with('errorBitly','Anda memasukkan urutan yang sama bambang -_-');
        }
        foreach ($p->form->pertanyaan as $key => $value) {
            if ($value->sorting == null) {
                echo ("GENERATE\n");
                $value->update([
                    'sorting' => $key+1,
                ]);
            }
        }

        $p->sorting = (int)$request->number;
        $p->save();

        $b = FormPertanyaan::where('form_id',$p->form_id)->whereNotIn('id',[$p->id])->get();
        $index = 1;
        foreach ($b as $key => $value) {
            if($index >= (int)$request->number){
                $value->update([
                    'sorting' => $index+1,
                ]);
            }else{
                $value->update([
                    'sorting' => $index,
                ]);
            }
            $index++;
        }
        return redirect()->back()->with('success','Sukses mengganti urutan');
    }
}
