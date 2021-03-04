<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SMasuk;
use App\SKeluar;


class GalleryController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
