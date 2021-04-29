<?php

namespace App\Http\Controllers;

use App\Exports\FormExport;
use App\Form;
use App\FormPertanyaan;
use App\Mail\FormEmail;
use DateTime;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class FeatureFormController extends Controller
{
    /**
     * GET ACCESS
     * menampilkan halama fitur
     */
    public function index()
    {

        return view('client.form.index');
    }

    /**
     * POST ACCESS
     * menginject kode ke email
     */
    public function email(Request $request)
    {
        do {
            $code = Str::random(10);
            $user = Form::where('token', $code)->first();
        } while ($user);

        $date = new DateTime('now');
        $date = $date->format('Y-m-d H:i:s');

        $form = Form::create([
            'judul'     => "JUDUL DISINI (mohon diganti)",
            'pemilik'   => $request->email,
            'deadline'  => $date,
            'token'  => $code,
            'bitly' => $code,
            'deskripsi' => 'DESKRIPSI DISINI (mohon diganti)',
            'afterform' => 'AFTERFORM DISINI (mohon diganti)',
            'afterformlink' => null,
        ]);

        // TODO :: kirim ke email
        $mail = Mail::to($request->email)->send(new FormEmail($form->token));

        /*
        jika (email gagal)
        hapus form dan return back dengan flash message gagal
        */
        if (count(Mail::failures()) > 0) {
            $form->delete();
            session()->flash('error', 'Gagal mengirim email, coba lagi nanti atau coba seklai lagi');
            return redirect()->back();
        }

        $pertanyaan = FormPertanyaan::create([
            'form_id'       => $form->id,
            'tipe'          => 'text',
            'pertanyaan'    => 'PERTANYAAN DISINI (mohon diganti/dihapus)',
            'opsi'          => null,
            'mandatory'     => true,
        ]);

        /*
        return back dengan flash message sukses
        'mohon cek di inbox utama email, 
        atau MUNGKIN bagian spam email'
        */
        session()->flash('success', 'Berhasil membuat form, silahkan cek email anda');
        return redirect()->back();
    }

    /**
     * GET ACCESS
     * menampilkan halaman edit form
     */
    public function show($token)
    {
        $data = Form::with([
            'pertanyaan', 'penjawab', 'penjawab.jawaban',
            'penjawab.jawaban.pertanyaan'
        ])->where('token', $token)->first();
        // dd($data);

        
        if ($data) {
            $data->pertanyaan = $data->pertanyaan->sortBy('sorting')->all();
            $data['inputdeadline'] = join("T", explode(" ", $data->deadline));

            return view('client.form.show', [
                'data' => $data,
            ]);
        }else{
            session()->flash('error','Token yang anda masukkan salah');
            return redirect()->route('f.form.index');
        }
    }

    /**
     * GET ACCESS
     * mengunduh data 
     */
    public function excel($token)
    {
        $form = Form::where('token',$token)->first();
        return Excel::download(new FormExport($form->id), $form->judul . '.xlsx');
    }

    /**
     * POST ACCESS
     * mengunci akses edit pertanyaan
     */
    public function lock($token)
    {
        $form = Form::where('token',$token)->first();
        $form->terkunci = true;
        $form->save();

        session()->flash('success','Sukses mengunci form');
        return redirect()->back();
    }

    /**
     * PUT ACCESS
     * update informasi form
     */
    public function update(Request $request, $token)
    {

        $date = join(' ',explode("T", $request->deadline));
        // dd($request, $date, $token);

        $form = Form::where('token',$token)->first();

        if (!$form) {
            session()->flash('error','Token untuk Form salah');
            return redirect()->route('f.form.index');
        }
        $form->update([
            'judul'     => $request->judul,
            'deadline'  => $date,
            'deskripsi' => $request->deskripsi,
            'afterform' => $request->afterform,
            'afterformlink' => $request->afterformlink,
        ]);
        
        session()->flash('success','Sukses mengupdate Form');
        return redirect()->back();
    }

    /**
     * PUT ACCESS
     * update informasi shortlink
     */
    public function bitly(Request $request, $token)
    {
        // dd($request, $request['valid-shortlink']);

        $form = Form::where('token',$token)->first();

        if (!$form) {
            session()->flash('error','Token untuk Form salah');
            return redirect()->route('f.form.index');
        }

        if ($form->bitly == $request['valid-shortlink']) {
            session()->flash('warning','Sadar diri kawan, anda tidak mengubah apapun');
            return redirect()->back();
        }

        if(Form::where('bitly', $request['valid-shortlink'])->first())
        {
            session()->flash('error','Shortlink yang anda pilih : (' . $request['valid-shortlink'] . ') Sudah digunakan oleh oranglain' );
            return redirect()->back();
        }

        $form->update([
            'bitly' => $request['valid-shortlink'],
        ]);
        session()->flash('success','Berhasil mengubah shortlink');
        return redirect()->back();
    }

    /**
     * DELETE ACCESS
     * menghapus form
     */
    public function destroy($token)
    {
        //
        $form = Form::where('token',$token)->first();
        $form->delete();

        session()->flash('success','Berhasil menghapus form');
        return redirect()->route('f.form.index');
    }

    /**
     * POST ACCESS
     * menambah pertanyaan baru
     */
    public function qcreate(Request $request, $token)
    {
        $form = Form::with('pertanyaan')->where('token',$token)->first();

        if (!$form) {
            session()->flash('error','Token untuk Form salah');
            return redirect()->route('f.form.index');
        }

        FormPertanyaan::create([
            'form_id'       => $form->id,
            'tipe'          => $request->tipe,
            'pertanyaan'    => $request->pertanyaan,
            'opsi'          => $request->opsi,
            'sorting'       => count($form->pertanyaan) + 1,
            'mandatory'     => $request->required == "ya" ? true : false,
        ]);

        session()->flash('success', 'Sukses menambah pertanyaan');

        return redirect()->back();
    }

    /**
     * PUT ACCESS
     * mengubah pertanyaan dengan qid tertentu
     */
    public function qupdate(Request $request, $token, $qid)
    {
        if (!Form::where('token',$token)->first()) {
            session()->flash('error','Token untuk Form salah');
            return redirect()->route('f.form.index');
        }

        $f = FormPertanyaan::find($qid);

        if (!$f) {
            session()->flash('error','ID untuk Pertanyaan salah');
            return redirect()->route('f.form.index');
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

        if ($f->mandatory != ($request->required == 'ya')) {
            $f->mandatory = $request->required == 'ya' ? true : false;
        }

        $f->save();

        session()->flash('success', 'Sukses mengubah pertanyaan');

        return redirect()->back();
    }

    /**
     * DELETE ACCESS
     * menghapus pertanyaan dengan qid tertentu
     */
    public function qdestroy(Request $request, $token, $qid)
    {
        // 
        if (!Form::where('token',$token)->first()) {
            session()->flash('error','Token untuk Form salah');
            return redirect()->route('f.form.index');
        }

        $f = FormPertanyaan::find($qid);

        if (!$f) {
            session()->flash('error','ID untuk Pertanyaan salah');
            return redirect()->route('f.form.index');
        }

        $f->delete();

        session()->flash('success', 'Sukses menghapus pertanyaan');

        return redirect()->back();
    }

    /**
     * POST ACCESS
     * mengurutkan pertanyaan
     */
    public function qsort(Request $request, $token)
    {
        // 
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
