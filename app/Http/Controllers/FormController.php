<?php

namespace App\Http\Controllers;

use App\Exports\FormExport;
use App\Form;
use App\FormPertanyaan;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $form = Form::with('pertanyaan')->paginate(10);

        return view('form.index',[
            'form' => $form,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul'    => 'required|string',
            'pemilik' => 'required',
            'deadline' => 'required',
            'token'     => 'required',
        ]);

        if ($validator->fails()) {
            // flash('error')->error();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $form = Form::create([
            'judul'     => $request->judul,
            'pemilik'   => $request->pemilik,
            'deadline'  => $request->deadline,
            'token'  => $request->token == "YA" ? true : false,
            'bitly' => Str::random(10),
        ]);

        return redirect()->route('form.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $form = Form::find($id);
        $form = Form::with(['pertanyaan','penjawab','penjawab.jawaban', 'penjawab.jawaban.pertanyaan'])->find($id);

        // dd($form);
        // $pertanyaan = FormPertanyaan::where('form_id',$id)->get();

        $origin = new DateTime();
        $deadline = new DateTime($form->deadline);
        // $deadline = new DateTime('2021-02-06 00:00:00');
        $diff = $origin->diff($deadline);
        if ($diff->invert) {
            $form->kadaluarsa = true;
        }

        $form->dedlen = join("T",explode(" ",$form->deadline));

        return view('form.detail',[
            'form'          => $form,
        ]);
    }


    public function lock($id)
    {
        $form = Form::find($id);
        $form->terkunci = true;
        $form->save();

        Session::flash('success','Sukses mengunci pertanyaan');
        return redirect()->back();
    }

    public function excel($id)
    {

        // $form = Form::with(['pertanyaan','penjawab','penjawab.jawaban', 'penjawab.jawaban.pertanyaan'])->find($id);

        // return view('form.excel',[
        //     'form' => $form,
        // ]);
        return Excel::download(new FormExport($id), 'Response.xlsx');
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
        $form = Form::find($id)->update([
            'judul'     => $request->judul,
            'pemilik'   => $request->pemilik,
            'deadline'  => $request->deadline,
            'token'  => $request->token == "YA" ? true : false,
        ]);

        Session::flash('success','Sukses mengUPDATE informasi FORM');
        return redirect()->back();
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

    public function updateBitly(Request $request, $id)
    {
        $myf = Form::find($id);

        $bitly = join('',explode(' ',$request->bitly));

        if($myf->bitly == $bitly)
        {
            return redirect()->back()->with('errorBitly','sadar diri saudara, anda tidak mengubah apa apa :))');
        }

        if($form = Form::where('bitly', $bitly)->first())
        {
            return redirect()->back()->with('errorBitly','Token yang anda ajukan ('.$bitly.') sudah ada yang pakai');
        }

        $myf->bitly = $bitly;
        $myf->save();

        return redirect()->back()->with('success','Token yang anda ajukan berhasil dirubah');
    }
}
