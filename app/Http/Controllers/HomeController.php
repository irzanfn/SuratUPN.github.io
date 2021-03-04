<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SMasuk;
use App\SKeluar;
use App\Disposisi;
use App\User;

class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $smasuk = SMasuk::count();
        $skeluar = SKeluar::count();
        $disposisi = Disposisi::count();
        $users = User::count();
        $data = SMasuk::join('users', 'suratmasuk.user_id', '=', 'users.id')->select('suratmasuk.*','users.name')->orderBy('id', 'DESC')->where('suratmasuk.sifat','Umum')->get();
        $index = 'index';
        return view('index',['smasuk' => $smasuk,'skeluar' => $skeluar,'disposisi' => $disposisi,'users' => $users,'index' => $index,'title' => 'Surat Masuk'],compact('data'));
    }

    public function gallerymasuk()
    {
        $data = SMasuk::orderBy('id', 'DESC')->get();
        $surat = 'Masuk';
        return view('gallery.gallery',['gallery' => $surat,'title' => 'Gallery Surat Masuk'],compact('data'));
    }

    public function gallerykeluar()
    {
        $data = SKeluar::orderBy('id', 'DESC')->get();;
        $surat = 'Keluar';
        return view('gallery.gallery', ['gallery' => $surat,'title' => 'Gallery Surat Keluar'], compact('data'));
    }
}
