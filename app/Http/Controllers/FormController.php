<?php

namespace App\Http\Controllers;

use App\Form;
use App\FormPertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        ]);

        if ($validator->fails()) {
            // flash('error')->error();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Form::create([
            'judul'     => $request->judul,
            'pemilik'   => $request->pemilik,
            'deadline'  => $request->deadline,
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

        dd($form);
        // $pertanyaan = FormPertanyaan::where('form_id',$id)->get();

        return view('form.detail',[
            'form'          => $form,
            // 'pertanyaan'    => $pertanyaan,
        ]);
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
        //
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
}
