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
        $form = Form::where('pemilik','HIMSI')->orWhere('pemilik',Auth::user()->role)->with('penjawab')->paginate(10);

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
        // dd($request);
        $validator = Validator::make($request->all(), [
            'judul'    => 'required|string',
            'pemilik' => 'required',
            'deadline' => 'required',
            'deskripsi' => 'required',
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
            'deskripsi' => $request->deskripsi,
            'token'     => $code,
            'bitly'     => $code,
            'afterform' => null,
            'afterformlink' => null,
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
        $form = Form::with([
            'pertanyaan','penjawab','penjawab.jawaban', 
            'penjawab.jawaban.pertanyaan'
            ])->find($id);

        if (!$form) {
            session()->flash('error','Form tidak ditemukan');
            return redirect()->route('form.index');
        }

        if ($form->pemilik != "HIMSI" && $form->pemilik != Auth::user()->role) {
            session()->flash('error','Form bukan milik anda');
            return redirect()->route('form.index');
        }

        $form->pertanyaan = $form->pertanyaan->sortBy('sorting')->all();

        /* IDK this, this must be 'form is over' for user experience
        $origin = new DateTime();
        $deadline = new DateTime($form->deadline);
        // $deadline = new DateTime('2021-02-06 00:00:00');
        $diff = $origin->diff($deadline);
        if ($diff->invert) {
            $form->kadaluarsa = true;
        }
        */
        $form['inputdeadline'] = join("T", explode(" ", $form->deadline));

        return view('form.detail',[
            'data' => $form,
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
        $f = Form::with('penjawab')->find($id);

        if (!$f) {
            session()->flash('error','ID FORM SALAH');
            return redirect()->route('form.index');
        }

        if (sizeof($f->penjawab)  < 1) {
            session()->flash('error','Anda belum memiliki responden');
            return redirect()->back();
        }
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
        $date = join(' ',explode("T", $request->deadline));

        /* 
        $form = Form::find($id)->update([
            'judul'     => $request->judul,
            'pemilik'   => $request->pemilik,
            'deadline'  => $request->deadline,
            'token'  => $request->token == "YA" ? true : false,
        ]);
        */

        $form = Form::find($id);
        if (!$form) {
            session()->flash('error','Form tidak ditemukan');
            return redirect()->route('form.index');
        }

        $form->update([
            'judul'     => $request->judul,
            'deadline'  => $date,
            'deskripsi' => $request->deskripsi,
            'afterform' => $request->afterform,
            'afterformlink' => $request->afterformlink,
        ]);

        Session::flash('success','Sukses mengupdate Form');
        return redirect()->back();
    }

     /**
     * ADMIN
     * POST Access
     * digunakan untuk mengupdate short-link atau bitly nya Form
     */
    public function updateBitly(Request $request, $id)
    {
        $form = Form::find($id);

        if ($form->bitly == $request['valid-shortlink']) {
            session()->flash('warning','Sadar diri kawan, anda tidak mengubah apapun');
            return redirect()->back();
        }

        if(Form::where('bitly', $request['valid-shortlink'])->first())
        {
            session()->flash('error','Shortlink yang anda pilih : (' . $request['valid-shortlink'] . ') Sudah digunakan oleh oranglain' );
            return redirect()->back();
        }

        $form->bitly = $request['valid-shortlink'];
        $form->save();

        session()->flash('success','Berhasil mengubah shortlink');
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

        session()->flash('success','Berhasil menghapus form');
        return redirect()->route('form.index');
    }

   
}
