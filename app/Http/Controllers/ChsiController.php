<?php

namespace App\Http\Controllers;

use App\Curhat;
use App\Krisar;
use App\PesanCurhat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ChsiController extends Controller
{

    /**
     * Client-side
     */

    /**
     * method index
     * menampilkan menu dari CHSI
     */
    public function index()
    {
        return redirect()->route('curhat.index');
        return view('client.chsi.index');
    }

    /**
     * method curhatindex
     * menampilkan form curhat 
     */
    public function curhatindex()
    {
        // return view('client.chsi.curhatindex');
        return view('koneksi.chsi.index');
    }

    /** 
     *method curhatbaru
     * menampilkan pemilihan kategori
    */
    public function curhatbaru()
    {
        // return view('client.chsi.curhatbaru');
        return view('koneksi.chsi.add-curhat');
    }

    public function curhatBaruAtribut()
    {
        return view('client.chsi.curhatindex');
    }
    
    /**
     * method curhatsubmit
     * untuk store data
     */
    public function curhatsubmit(Request $request)
    {
        // dd($request);

        // cek data-submit
        $validator = Validator::make($request->all(), [
            'kategori'    => 'required|string',
            'respon' => '',
            'customToken' => 'unique:curhats,token',
        ],
        [
            'customToken.unique'=>'Token sudah diambil orang'
        ]
        );

        if ($request->respon==null){
            $request->respon = false;
        }

        if ($validator->fails()) {
            // flash('error')->error();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // cek custom token (jika ada)
        if ($request->customToken != ''){
            $token=$request->customToken;
        }else{
            $token = $this->getName(10);
        }

        // pesan default
        if ($request->respon == true){
            $pesan = "Hai kak, tokenmu untuk curhatan ini " . $token . ". Catat baik-baik ya! Curhatanmu tidak bisa diakhiri sebelum kami membalasnya yaa. Yuk sini curhat~";
        }else{
            $pesan = "Hai kak, tokenmu untuk curhatan ini " . $token . ".  Catat baik-baik ya! Yuk sini curhat~";
        };

        // submit into database
        $curhat = Curhat::create([
            'token' => $token,
            'dibalas' => $request->respon,
            'kategori' => $request->kategori,
        ]);
        
        $pesanDefault = PesanCurhat::create([
            'curhat_id' => $curhat->id,
            'chat' => $pesan,
            'psdm' => true,
        ]);
        // if(!$request->respon) {
        //     $curhat->selesai = true;
        //     $curhat->save();
        // }

        return redirect()->route('curhat.chat', $token);
        
    }

    public function curhatchat($token)
    {
        // cek di database
        $data = Curhat::with('chat')->where('token', $token)->first();

        if (!$data) {
            return redirect()->route('curhat.index')->with('error', 'curhatan anda tidak ditembukan atau token anda salah');
        }

        //dd($data);

        return view('client.chsi.curhatchat', [
            'data' => $data,
        ]);
    }

    public function curhatfind(Request $request)
    {
        return redirect()->route('curhat.chat', $request->token);
    }

    // public function curhatfinish()
    // {
    //     return view('client.chsi.curhatfinish');
    // }

    public function curhatfinishtoken($token)
    {
        $curhat = Curhat::where('token', $token)->first();

        $curhat->update([
            'selesai' => true,
        ]);

        return redirect()->route('curhat.chat', $token);
    }

    public function curhatchatsubmit(Request $request, $token)
    {
        $curhat = Curhat::where('token', $token)->first();

        $pesan = PesanCurhat::create([
            'curhat_id' => $curhat->id,
            'chat' => $request->chat,
            'psdm' => false,
        ]);

        return redirect()->route('curhat.chat', $token);
    }

    public function kritikindex()
    {
        // return view('client.chsi.kritikindex');
        return view('koneksi.chsi.kritikindex');
    }

    public function kritikform($bidang)
    {
        return view('client.chsi.kritikform', [
            'bidang' => $bidang,
        ]);
    }

    public function kritiksubmit(Request $request)
    {
        Krisar::create([
            'bidang' => $request->bidang,
            'krisar' => $request->krisar,
        ]);

        return redirect()->route('kritik.index')->with('info', 'Terimakasih atas kritik dan sarannya');
        
    }

    public function meditasiindex()
    {
        return view('client.chsi.meditasiindex');
    }

    public function meditasikategori($kategori)
    {
        // load data dari database untuk ditampilkan

        return view('client.chsi.meditasikategori', [
            'data' => null,
            'kategori' => $kategori,
        ]);
    }

    /**
     * ADMIN method
     */

    public function cekpsdm()
    {
        if (Auth::User()->email == 'psdm') {
            return true;
        } else {
            return false;
        }
    }

    public function psdmindex()
    {
        if (!$this->cekpsdm()) {
            return redirect()->route('home');
        }

        return view('chsi.index');
    }

    public function psdmcurhatindex()
    {
        $data = Curhat::with('chat')->get()->sortByDesc('created_at');
        foreach ($data as $curhat) {
            $curhat->nunggu = false;
            if ($curhat->dibalas) {
                if (sizeof($curhat->chat) > 0) {
                    if (!$curhat->chat[sizeof($curhat->chat) - 1]->psdm) {
                        $curhat->nunggu = true;
                    }
                }
            }
        }
        return view('chsi.curhat.index', [
            'data' => $data,
        ]);
    }

    public function psdmcurhatchat($token)
    {
        $data = Curhat::with('chat')->where('token', $token)->first();

        return view('chsi.curhat.chat', [
            'data' => $data,
        ]);
    }

    public function psdmcurhatchatsubmit(Request $request, $token)
    {
        $curhat = Curhat::where('token', $token)->first();

        $pesan = PesanCurhat::create([
            'curhat_id' => $curhat->id,
            'chat' => $request->chat,
            'psdm' => true,
        ]);

        return redirect()->route('chsi.admin.curhat.chat', $curhat->token);
    }

    public function psdmcurhatmotivasisubmit(Request $request, $token)
    {
        $curhat = Curhat::where('token', $token)->first();
        $curhat->quote = $request->motivasi;
        $curhat->save();

        return redirect()->route('chsi.admin.curhat.chat', $curhat->token);
    }

    public function psdmkritikindex()
    {
        if (Auth::User()->role == 'PSDM') {
            $PSDM = Krisar::where('bidang', 'PSDM')->get();
            $RISTEK = Krisar::where('bidang', 'RISTEK')->get();
            $SERA = Krisar::where('bidang', 'SERA')->get();
            $HUBLU = Krisar::where('bidang', 'HUBLU')->get();
            $AKADEMIK = Krisar::where('bidang', 'AKADEMIK')->get();
            $KESTARI = Krisar::where('bidang', 'KESTARI')->get();
            $BPH = Krisar::where('bidang', 'BPH')->get();
            $MEDIA = Krisar::where('bidang', 'MEDIA')->get();
            // dd($krisar);
            return view('chsi.kritik.psdm', [
                'PSDM' => $PSDM,
                'RISTEK' => $RISTEK,
                'SERA' => $SERA,
                'HUBLU' => $HUBLU,
                'AKADEMIK' => $AKADEMIK,
                'KESTARI' => $KESTARI,
                'BPH' => $BPH,
                'MEDIA' => $MEDIA,
            ]);
        } else {
            $krisar = Krisar::where('bidang', Auth::User()->role)->get();
            return view('chsi.kritik.index', [
                'krisar' => $krisar,
            ]);
        }
    }

    public function psdmmeditasiindex()
    {
        return view('chsi.meditasi.index');
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
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
}
