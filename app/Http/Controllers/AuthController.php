<?php

namespace App\Http\Controllers;

use App\Form;
use App\Krisar;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('auth.login');
        return view('koneksi.landing-admin');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|string',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            // flash('error')->error();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('admin.home');
        }else{
            Session::flash('error-password','Password Salah');
            return redirect()->back()->withInput();
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function dashboard()
    {
        $form = Form::where('pemilik','HIMSI')->orWhere('pemilik',Auth::user()->role)->with('penjawab')->latest()->take(3)->get();
        $krisar = Krisar::where('bidang', Auth::User()->role)->latest()->take(3)->get();
        if (Auth::User()->role == 'PSDM') {
            $krisar = Krisar::latest()->take(3)->get(); 
        };

        // return view('landing-page-admin');
        return view('koneksi.admin.dashboard', [
            'form' => $form,
            'krisar' => $krisar,
        ]);
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
}
