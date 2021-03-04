<?php

namespace App\Http\Controllers;

use App\SKeluar;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Collection;

class SKeluarController extends Controller
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
    public function index()
    {
        if (Auth::check()) {
            $data = SKeluar::join('users', 'suratkeluar.user_id', '=', 'users.id')->select('suratkeluar.*','users.name')->orderBy('id', 'DESC')->get();
            $surat = 'keluar';
            return view('surat.surat', ['surat' => $surat,'title' => 'Surat Keluar'], compact('data'));
        }else{
            return redirect()->route('login');
        }
    }

    public function indexInternal()
    {
        if (Auth::check()) {
            $data = SKeluar::join('users', 'suratkeluar.user_id', '=', 'users.id')->select('suratkeluar.*','users.name')->orderBy('id', 'DESC')->where('class','Internal')->get();
            $surat = 'keluar';
            $internal = 'internal';
            return view('surat.surat',['surat' => $surat, 'internal'=> $internal],compact('data'));
        }else{
            return redirect()->route('login');
        }
    }

    public function indexExternal()
    {
        if (Auth::check()) {
            $data = SKeluar::join('users', 'suratkeluar.user_id', '=', 'users.id')->select('suratkeluar.*','users.name')->orderBy('id', 'DESC')->where('class','External')->get();
            $surat = 'keluar';
            $external = 'external';
            return view('surat.surat',['surat' => $surat,'external'=> $external],compact('data'));
        }else{
            return redirect()->route('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lampiran = $request->file('lampiran');
        $ext = $lampiran->getClientOriginalExtension();
        $ext = Str::lower($ext);
        $newName = rand(1000000, 1001238912) . "." . $ext;
        $lampiran->move('uploads/file', $newName);
        $post = ($request->except(['lampiran']));
        $post['lampiran'] = $newName;
        SKeluar::create($post);
        return redirect('/Surat/sKeluar')->with('status', 'Data Surat Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SKeluar  $sKeluar
     * @return \Illuminate\Http\Response
     */
    public function show(SKeluar $sKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SKeluar  $sKeluar
     * @return \Illuminate\Http\Response
     */
    public function edit(SKeluar $sKeluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SKeluar  $sKeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SKeluar $sKeluar)
    {
        if (empty($request->file('lampiran'))) {
            $newName = $sKeluar->lampiran;
        } else {
            $lampiran = $request->file('lampiran');
            $ext = $lampiran->getClientOriginalExtension();
            $ext = Str::lower($ext);
            $newName = rand(1000000, 1001238912) . "." . $ext;
            $lampiran->move('uploads/file', $newName);
            if (File::exists('uploads/file/' . $sKeluar->lampiran)) {
                unlink('uploads/file/' . $sKeluar->lampiran);
            }
        }
        $post = ($request->except(['lampiran']));
        $post['lampiran'] = $newName;

        SKeluar::where('id', $sKeluar->id)
            ->update([
                'no_surat' => $post['no_surat'],
                'class' => $post['class'],
                'asal_surat' => $post['asal_surat'],
                'tujuan_surat' => $post['tujuan_surat'],
                'tanggal_surat' => $post['tanggal_surat'],
                'isi_surat' => $post['isi_surat'],
                'keterangan' => $post['keterangan'],
                'lampiran' => $post['lampiran'],

            ]);
        return redirect('/Surat/sKeluar')->with('status', 'Data Surat Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SKeluar  $sKeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(SKeluar $sKeluar)
    {
        if (File::exists('uploads/file/' . $sKeluar->lampiran)) {
            unlink('uploads/file/' . $sKeluar->lampiran);
        }
        SKeluar::destroy($sKeluar->id);
        return redirect('/Surat/sKeluar')->with('status', 'Data Surat Berhasil Dihapus!');
    }
}
