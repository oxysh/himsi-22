<?php

namespace App\Http\Controllers;

use App\Form;
use App\FormPertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FormPertanyaanController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request, $id)
    {
        // dd($request);
        /*
        FormPertanyaan::create([
            'form_id'       => $request->formid,
            'tipe'          => $request->tipe,
            'pertanyaan'    => $request->pertanyaan,
            'opsi'          => $request->opsi,
            'mandatory'     => $request->mandatory == "true" ? true : false,
        ]);  */

        $form = Form::with('pertanyaan')->find($id);

        FormPertanyaan::create([
            'form_id'       => $form->id,
            'tipe'          => $request->tipe,
            'pertanyaan'    => $request->pertanyaan,
            'opsi'          => $request->opsi,
            'sorting'       => count($form->pertanyaan) + 1,
            'mandatory'     => $request->required == "Iya" ? true : false,
        ]);

        Session::flash('success', 'Sukses menambah pertanyaan');

        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id, $qid)
    {
        if (!Form::find($id)) {
            session()->flash('error','Form tidak ditemukan');
            return redirect()->route('form.index');
        }

        $f = FormPertanyaan::find($qid);

        if (!$f) {
            session()->flash('error','ID untuk Pertanyaan salah');
            return redirect()->route('form.index');
        }

        if ($f->tipe != $request->tipe) {
            $f->tipe = $request->tipe;
        }

        if ($f->pertanyaan != $request->pertanyaan) {
            $f->pertanyaan = $request->pertanyaan;
        }

        if ($f->opsi != $request->opsi) {
            $f->opsi = $request->opsi;
        }

        if ($f->mandatory != ($request->required == 'Iya')) {
            $f->mandatory = $request->required == 'Iya' ? true : false;
        }

        $f->save();

        session()->flash('success', 'Sukses mengubah pertanyaan');

        return redirect()->back();
    }

    public function destroy($id, $qid, Request $request)
    {
        if (!Form::find($id)) {
            session()->flash('error','Form tidak ditemukan');
            return redirect()->route('form.index');
        }

        $f = FormPertanyaan::find($qid);


        if (!$f) {
            session()->flash('error','ID untuk Pertanyaan salah');
            return redirect()->route('form.index');
        }

        $f->delete();

        session()->flash('success', 'Sukses menghapus pertanyaan');

        return redirect()->back();
    }

    public function sort(Request $request, $id)
    {
        $p = FormPertanyaan::with(['form', 'form.pertanyaan'])->find($request->pertanyaan);

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
