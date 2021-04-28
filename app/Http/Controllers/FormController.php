<?php

namespace App\Http\Controllers;

use App\Exports\FormExport;
use App\Form;
use App\FormPertanyaan;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class FormController extends Controller
{
    /**
     * ADMIN
     * GET Access
     * menampilkan list Form
     */
    public function index()
    {
        $form = Form::where('pemilik','HIMSI')->orWhere('pemilik',Auth::user()->role)->with('pertanyaan')->paginate(10);

        return view('form.index',[
            'form' => $form,
        ]);
    }

    /**
     * ADMIN
     * GET Access
     * menampilkan form-field untuk membuat suatu Form
     */
    public function create()
    {
        return view('form.create');
    }

    /**
     * ADMIN
     * POST Access
     * submit dari form-field
     * membuat form baru
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

        $code = Str::random(10);

        $form = Form::create([
            'judul'     => $request->judul,
            'pemilik'   => $request->pemilik,
            'deadline'  => $request->deadline,
            'token'  => $code,
            'bitly' => $code,
        ]);

        return redirect()->route('form.show',$form->id);
    }

    /**
     * ADMIN
     * GET Access (livewire ON)
     * Menampilkan detil suatu form
     */
    public function show($id)
    {
        // $form = Form::find($id);
        $form = Form::with(['pertanyaan','penjawab','penjawab.jawaban', 'penjawab.jawaban.pertanyaan'])->find($id);

        $form->pertanyaan = $form->pertanyaan->sortBy('sorting')->all();
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

    /**
     * ADMIN
     * GET Access
     * digunakan untuk mengunci 'akes edit' suatu form
     */
    public function lock($id)
    {
        $form = Form::find($id);
        $form->terkunci = true;
        $form->save();

        Session::flash('success','Sukses mengunci pertanyaan');
        return redirect()->back();
    }

    /**
     * ADMIN
     * GET Access
     * digunakan untuk download data dalam bentuk excel
     */
    public function excel($id)
    {
        return Excel::download(new FormExport($id), 'Response.xlsx');
    }

    /**
     * 
     */
    public function edit($id)
    {
        //
    }

    /**
     * ADMIN
     * POST Access
     * digunakan untuk memperbarui informasi dasar suatu Form
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
     * ADMIN
     * PUT Access
     * menghapus form ini
     * (beserta pertanyaan, dan data jawaban)
     */
    public function destroy($id)
    {
        $form = Form::find($id);
        $form->delete();

        return redirect()->route('form.index');
    }

    /**
     * ADMIN
     * POST Access
     * digunakan untuk mengupdate short-link atau bitly nya Form
     */
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
