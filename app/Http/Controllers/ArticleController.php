<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ArticleController extends Controller
{
    /**
     * Client
     */
    public function index(Request $request) {
        if ($request->has('search')) {
            $search = $request->input('search');
            $articles = Article::latest()
                ->where('status', 'publish')
                ->where('title', 'LIKE', "%{$search}%")
                ->whereDate('schedule', '<=', Carbon::now('Asia/Jakarta'))
                ->orWhere('author', 'LIKE', "%{$search}%")
                ->where('status', 'publish')
                ->whereDate('schedule', '<=', Carbon::now('Asia/Jakarta'))
                ->paginate(10);
            return view('client.article.index', compact('articles', 'search'));
        } else {
            $articles = Article::latest()
                ->where('status', 'publish')
                ->whereDate('schedule', '<=', Carbon::now('Asia/Jakarta'))
                ->paginate(10);
            return view('client.article.index', compact('articles'));
        }
    }

    public function submit() {
        return view('client.article.submit');
    }

    public function submitted(Request $request) {
        // validation input
        $request->validate([
            'NIM'       => 'required',
            'title'     => 'required',
            'content'   => 'required',
        ]);
        // store to database (article table)
        Article::create([
            'author'    => $request->input('author'),
            'NIM'       => $request->input('NIM'),
            'title'     => $request->input('title'),
            'content'   => $request->input('content'),
            'status'    => 'submitted'
        ]);
        // redirect
        Session::flash('success', 'Selamat, artikel berjudul "' . $request->input('title') . '" telah dikirim! Jangan lupa untuk mengecek status dari artikelmu');
        return redirect()->route('article.index');
    }

    public function check() {
        return view('client.article.check');
    }

    public function checked(Request $request) {
        if ($request->input('NIM') == null) {
            Session::flash('error', 'Silahkan masukkan NIM terlebih dahulu!');
            return redirect()->route('article.check');
        } else {
            return redirect()->route('article.result', $request->input('NIM'));
        }
    }

    public function result($NIM) {
        if (Article::where('NIM', $NIM)->get()->count() <= 0) {
            Session::flash('error', 'Tidak ditemukan artikel dengan NIM "' . $NIM . '"! Silahkan cermati NIM yang kamu tulis');
            return redirect()->route('article.check');
        } else {
            $articles = Article::where('NIM', $NIM)->orderBy('created_at', 'desc')->get();
            return view('client.article.check-result', compact('articles', 'NIM'));
        }
    }

    public function detail($id) {
        $article = Article::where('id', $id)
            ->where('status', 'publish')
            ->whereDate('schedule', '<=', Carbon::now('Asia/Jakarta'))
            ->first();
        if ($article === null) {
            Session::flash('error', 'Artikel tidak ditemukan');
            return redirect()->route('article.index');
        } else {
            return view('client.article.detail', compact('article'));
        }
    }

    /**
     * Admin
     */
    public function isAdmin() {
        // Cek user 'ristek' or 'admin'
        return (Auth::User()->email == 'ristek' or Auth::User()->email == 'bph') ? true : false;
    }

    public function adminIndex() {
        if ($this->isAdmin()) {
            $articles = Article::latest()->paginate(10);
            return view('article.index', compact('articles'));
        } else {
            return redirect()->route('home');
        }
    }

    public function edit(Article $article, Request $request) {
        if ($this->isAdmin()) {
            // validation input
            $request->validate([
                'author'    => 'required',
                'NIM'       => 'required',
                'title'     => 'required',
                'content'   => 'required',
                'schedule'  => 'date'
            ]);
            // Edit database (article table)
            Article::where('id', $article->id)
                ->update([
                    'author'    => $request->input('author'),
                    'NIM'       => $request->input('NIM'),
                    'title'     => $request->input('title'),
                    'content'   => $request->input('content'),
                    'schedule'  => $request->input('schedule'),
                    'feedback'  => $request->input('feedback')
                ]);
            // redirect
            Session::flash('success', 'Berhasil mengedit artikel berjudul "' . $request->input('title') . '"');
            return redirect()->route('article.admin.index');
        } else {
            return redirect()->route('home');
        }
    }

    public function publish(Article $article) {
        if ($this->isAdmin()) {
            // Edit database (article table)
            Article::where('id', $article->id)
                ->update([
                    'status'    => 'publish',
                    'schedule'  => Carbon::now()
                ]);
            // redirect
            Session::flash('success', 'Berhasil memposting artikel berjudul "' . $article->title . '"');
            return redirect()->route('article.admin.index');
        } else {
            return redirect()->route('home');
        }
    }

    public function schedule(Article $article, Request $request) {
        if ($this->isAdmin()) {
            // Edit database (article table)
            Article::where('id', $article->id)
                ->update([
                    'status'    => 'publish',
                    'schedule'  => $request->schedule
                ]);
            // redirect
            Session::flash('success', 'Berhasil menjadwalkan artikel berjudul "' . $article->title . '" pada ' . date('l, d F - H:i', strtotime($request->schedule)));
            return redirect()->route('article.admin.index');
        } else {
            return redirect()->route('home');
        }
    }

    public function decline(Article $article, Request $request) {
        if ($this->isAdmin()) {
            // Validation
            $request->validate(['feedback' => 'required']);
            // Edit database (article table)
            Article::where('id', $article->id)
                ->update([
                    'status'    => 'decline',
                    'feedback'  => $request->input('feedback')
                ]);
            // redirect
            Session::flash('success', 'Berhasil menolak artikel berjudul "' . $article->title . '"');
            return redirect()->route('article.admin.index');
        } else {
            return redirect()->route('home');
        }
    }

    public function reset(Article $article) {
        if ($this->isAdmin()) {
            // Edit database (article table)
            Article::where('id', $article->id)
                ->update([
                    'status'    => 'submitted',
                    'schedule'  => null,
                    'feedback'  => null
                ]);
            // redirect
            Session::flash('success', 'Berhasil mereset artikel berjudul "' . $article->title . '"');
            return redirect()->route('article.admin.index');
        } else {
            return redirect()->route('home');
        }
    }

    public function delete(Article $article) {
        if ($this->isAdmin()) {
            Article::destroy($article->id);
            Session::flash('success', 'Artikel "'.$article->title.'" telah dihapus.');
            return redirect()->route('article.admin.index');
        } else {
            return redirect()->route('home');
        }
    }
}