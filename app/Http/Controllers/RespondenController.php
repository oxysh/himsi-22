<?php

namespace App\Http\Controllers;

use App\Form;
use App\FormJawaban;
use App\FormPenjawab;
use App\FormPertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RespondenController extends Controller
{
    /**
     * ADMIN
     * GET Access
     * digunakan untuk menampilkan list form yang tersedia
     */
    public function index()
    {

        $form = Form::where('pemilik', 'HIMSI')->orWhere('pemilik', Auth::user()->role)->get();
        // dd($form);

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
     * ADMIN
     * POST Access
     * digunakan submit data testing form
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
     * ADMIN
     * GET Access
     * Digunakan pada route responden.show
     * digunakan untuk ADMIN melakukan testing form
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

    /**
     * ADMIN
     * GET Access (livewire ON)
     * digunakan untuk cek tracing jawaban (responden)
     */
    public function cari()
    {
        return view('responden.cari');
    }

    /**
     * ADMIN
     * GET Access
     * Digunakan pada route form.penjawab.edit
     * untuk menampilkan jawaban dalam bentuk field untuk diganti
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
            } else {
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
     * ADMIN
     * POST access
     * Digunakan pada route form.penjawab.update
     * untuk mengganti jawaban yang sudah disubmit
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
                } else {
                    FormJawaban::create([
                        'pertanyaan_id' => $key,
                        'penjawab_id' => $pid,
                        'jawaban' => $part,
                    ]);
                }
                array_push($arr, $ans);
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

    /**
     * generate random string
     */
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

    /**
     * CLIENT
     * POST Access
     * digunakan untuk submit form oleh CLIENT
     */
    public function submit(Request $request)
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
        session()->flash('success', 'Form berhasil di isi');
        return view('client.form.responden-thanks',[
            'form' => $form,
        ]);
    }

    /** 
     * CLIENT
     * GET Accesss
     * digunakan untuk menampilkan form siap di isi
     */
    public function bitly($bitly)
    {
        $form = Form::where('bitly', $bitly)->first();

        
        if (!$form) {
            session()->flash('error', 'Form tidak ditemukan');
            return redirect()->route('f.form.index');
        }

        $form->pertanyaan = $form->pertanyaan->sortBy('sorting')->all();

        foreach ($form->pertanyaan as $f) {
            if ($f->tipe == 'select') {
                $explode = explode(',', $f->opsi);
                $f->opsi = $explode;
            }
        }

        return view('client.form.responden', [
            'form'  => $form,
            'bitly' => $bitly,
        ]);
    }
}
