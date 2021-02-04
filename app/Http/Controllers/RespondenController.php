<?php

namespace App\Http\Controllers;

use App\Form;
use App\FormJawaban;
use App\FormPenjawab;
use App\FormPertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RespondenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $form = Form::get();

        return view('responden.index', [
            'form'  => $form,
        ]);
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

        $penjawab = FormPenjawab::create([
            'form_id'   => $request->formid,
            'token'     => $this->getName(10),
        ]);

        $arr = [];
        foreach ($request->except('_token') as $key => $part) {
            // $key gives you the key
            // $part gives you the value
            if (FormPertanyaan::find($key)) {
                $ans = FormJawaban::create([
                    'pertanyaan_id' => $key,
                    'penjawab_id'   => $penjawab->id,
                    'jawaban'       => $part,
                ]);
                array_push($arr, $ans);
            }
        }

        $form = Form::find($request->formid);
        if ($form->token) {
            Session::flash('success', 'Form berhasil di isi');
            return view('responden.feedback', [
                'token' => $penjawab->token,
            ]);
        } else {
            Session::flash('success', 'Form berhasil di isi');
            return view('responden.feedback', [
                'token' => null,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $form = Form::with('pertanyaan')->find($id);

        foreach ($form->pertanyaan as $f) {
            if ($f->tipe == 'select') {
                $explode = explode(',', $f->opsi);
                $f->opsi = $explode;
            }
        }
        return view('responden.form', [
            'form'  => $form,
        ]);
    }


    public function cari()
    {
        return view('responden.cari');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $pid)
    {
        $result = FormPenjawab::with(['form'])->find($pid);

        $form = Form::with(['pertanyaan'])->find($result->form->id);

        foreach ($form->pertanyaan as $p) {
            $jawaban = FormJawaban::where('pertanyaan_id', $p->id)
                ->where('penjawab_id', $pid)->first();
            if (!$jawaban) {
                $p->jawaban = "";
            }else {
                $p->jawaban = $jawaban->jawaban;
            }

            if ($p->tipe == 'select') {
                $explode = explode(',', $p->opsi);
                $p->opsi = $explode;
            }
        }

        return view('form.editpenjawab', [
            'result' => $result,
            'form'  => $form,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $pid)
    {
        $arr = [];
        foreach ($request->except('_token') as $key => $part) {
            // $key gives you the key
            // $part gives you the value

            if (FormPertanyaan::find($key)) {
                // $ans = FormJawaban::create([
                //     'pertanyaan_id' => $key,
                //     'penjawab_id'   => $penjawab->id,
                //     'jawaban'       => $part,
                // ]);
                $ans = FormJawaban::where('pertanyaan_id', $key)
                    ->where('penjawab_id', $pid)->first();
                if ($ans) {
                    $ans->update([
                        'jawaban' => $part,
                    ]);
                }else{
                    FormJawaban::create([
                        'pertanyaan_id' => $key,
                        'penjawab_id' => $pid,
                        'jawaban' => $part,
                    ]);
                }
                array_push($arr,$ans);
            }
        }

        return redirect()->route('form.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pid)
    {
        //
    }

    public function getName($n)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }




    public function regist()
    {

        return redirect()->route('regist.thanks');
        
        $form = Form::with('pertanyaan')->find(1);

        foreach ($form->pertanyaan as $f) {
            if ($f->tipe == 'select') {
                $explode = explode(',', $f->opsi);
                $f->opsi = $explode;
            }
        }
        return view('client.regist', [
            'form'  => $form,
        ]);
    }

    public function registcari()
    {
        return view('client.cari');
    }

    public function registstore(Request $request)
    {
        $penjawab = FormPenjawab::create([
            'form_id'   => $request->formid,
            'token'     => $this->getName(10),
        ]);

        $arr = [];
        foreach ($request->except('_token') as $key => $part) {
            // $key gives you the key
            // $part gives you the value
            if (FormPertanyaan::find($key)) {
                $ans = FormJawaban::create([
                    'pertanyaan_id' => $key,
                    'penjawab_id'   => $penjawab->id,
                    'jawaban'       => $part,
                ]);
                array_push($arr, $ans);
            }
        }

        $form = Form::find($request->formid);
        if ($form->token) {
            Session::flash('success', 'Form berhasil di isi');
            return view('client.feedback', [
                'token' => $penjawab->token,
            ]);
        } else {
            Session::flash('success', 'Form berhasil di isi');
            return view('client.feedback', [
                'token' => null,
            ]);
        }
    }
}
