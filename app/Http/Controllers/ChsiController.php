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
        return view('client.chsi.index');
    }

    /**
     * TODO
     * => merge curhatindex and curhatform
     *      => form untuk curhat langsung di
     *          bagian awal
     *      => tidak memerlukan method
     *          curhatform lagi
     */

    /**
     * method curhatindex
     * menampilkan form curhat 
     */
    public function curhatindex()
    {
        return view('client.chsi.curhatindex');
    }

    /**
     * method curhatform
     * menampilkan form curhat
     */
    public function curhatform()
    {
        return view('client.chsi.curhatform');
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
            'chat'    => 'required|string',
            'respon' => '',
        ]);

        if ($validator->fails()) {
            // flash('error')->error();
            return redirect()->back()->withErrors($validator)->withInput();
        }


        // submit into database
        $token = $this->getName(10);
        $curhat = Curhat::create([
            'token' => $token,
            'dibalas' => $request->respon ? true : false,
        ]);

        $pesan = PesanCurhat::create([
            'curhat_id' => $curhat->id,
            'chat' => $request->chat,
            'psdm' => false,
        ]);

        return redirect()->route('curhat.chat', $token);
    }

    public function curhatchat($token)
    {
        // cek di database
        $data = Curhat::with('chat')->where('token',$token)->where('dibalas',true)->first();

        if(!$data){
            return redirect()->route('curhat.index')->with('error','curhatan anda tidak ditembukan atau token anda salah');
        }

        // dd($data);

        return view('client.chsi.curhatchat',[
            'data' => $data,
        ]);
    }

    public function curhatfind(Request $request)
    {
        return redirect()->route('curhat.chat',$request->token);
    }

    public function curhatfinish()
    {
        return view('client.chsi.curhatfinish');
    }

    public function curhatchatsubmit(Request $request, $token)
    {
        $curhat = Curhat::where('token', $token)->first();

        $pesan = PesanCurhat::create([
            'curhat_id' => $curhat->id,
            'chat' => $request->chat,
            'psdm' => false,
        ]);

        return redirect()->route('curhat.chat',$token);
    }

    public function kritikindex()
    {
        return view('client.chsi.kritikindex');
    }

    public function kritikform($bidang)
    {
        return view('client.chsi.kritikform',[
            'bidang' => $bidang,
        ]);
    }

    public function kritiksubmit(Request $request)
    {
        Krisar::create([
            'bidang' => $request->bidang,
            'krisar' => $request->krisar,
        ]);

        return view('client.chsi.kritiksubmit');
    }

    public function meditasiindex()
    {
        return view('client.chsi.meditasiindex');
    }

    public function meditasikategori($kategori)
    {
        // load data dari database untuk ditampilkan

        return view('client.chsi.meditasikategori',[
            'data' => null,
            'kategori' => $kategori,
        ]);

    }

    /**
     * ADMIN method
     */

    public function cekpsdm()
    {
        if(Auth::User()->email == 'psdm'){
            return true;
        }else{
            return false;
        }
    }

    public function psdmindex()
    {
        if(!$this->cekpsdm()){
            return redirect()->route('home');
        }

        return view('chsi.index');
    }

    public function psdmcurhatindex()
    {
        $data = Curhat::all();
        return view('chsi.curhat.index',[
            'data' => $data,
        ]);
    }

    public function psdmcurhatchat($token)
    {
        $data = Curhat::with('chat')->where('token', $token)->first();

        return view('chsi.curhat.chat',[
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

    public function psdmkritikindex()
    {
        if(Auth::User()->email == 'psdm'){
            $krisar = Krisar::get();
        }else{
            $krisar = Krisar::where('bidang',Auth::User()->email)->get();
        }

        return view('chsi.kritik.index',[
            'krisar' => $krisar,
        ]);
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
