<?php

namespace App\Http\Controllers;

use App\SMasuk;
use App\Disposisi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Collection;

class SMasukController extends Controller
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
        $data = SMasuk::join('users', 'suratmasuk.user_id', '=', 'users.id')->select('suratmasuk.*','users.name')->orderBy('id', 'DESC')->get();
        $surat = 'masuk';
        return view('surat.surat',['surat' => $surat,'title' => 'Surat Masuk'],compact('data'));
        }else{
            return redirect()->route('login');
        }
    }

    public function indexInternal()
    {
        $data = SMasuk::orderBy('id', 'DESC')->where('class','Internal')->get();
        $surat = 'masuk';
        $internal = 'internal';
        return view('surat.surat',['surat' => $surat, 'internal'=> $internal,'title' => 'Surat Masuk Internal'],compact('data'));
    }

    public function indexExternal()
    {
        $data = SMasuk::orderBy('id', 'DESC')->where('class','External')->get();
        $surat = 'masuk';
        $external = 'external';
        return view('surat.surat',['surat' => $surat,'external'=> $external,'title' => 'Surat Masuk External'],compact('data'));
    }

    public function foreign($id)
    {
        if (Auth::check()) {
            $data = SMasuk::find($id)->disposisi()->where('s_masuk_id',$id)->orderBy('id', 'DESC')->get();
            $isi = SMasuk::where('id',$id)->select('isi_surat','no_surat')->first();
            return view('disposisi.disposisi',['id_surat' => $id,'dt' => $isi,'title' => 'Disposisi '.$isi->no_surat],compact('data'));
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
        $newName = rand(1000000,1001238912).".".$ext;
        $lampiran->move('uploads/file',$newName);
        $post = ($request->except(['lampiran']));
        $post['lampiran'] = $newName;
        $post['user_id'] = Auth::user()->id;
        SMasuk::create($post);
        return back()->with('status','Data Surat Berhasil Ditambahkan!');
    }

    public function foreign_store(Request $request)
    {
        $id_surat = $request->input('s_masuk_id');
        SMasuk::find($id_surat)->disposisi()->create($request->all());
        return back()->with('status','Disposisi Berhasil Ditambahkan!');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\SMasuk  $sMasuk
     * @return \Illuminate\Http\Response
     */
    public function show(SMasuk $sMasuk)
    {
        $id = $sMasuk->$id;
        return view('disposisi',['id_surat' => $surat]);
    }

    public function foreign_show(SMasuk $sMasuk,Disposisi $disposisi)
    {
        $dt = Disposisi::join('suratmasuk', 'disposisi.s_masuk_id', '=', 'suratmasuk.id')->select('disposisi.*','suratmasuk.asal_surat','suratmasuk.isi_surat','suratmasuk.no_surat')->where('disposisi.id',$disposisi->id)->first();
        return view('disposisi.detail',['id_surat' => $sMasuk->id,'title' => 'Disposisi '.$dt->no_surat],compact('dt'));
    }

    public function foreign_print(SMasuk $sMasuk,Disposisi $disposisi)
    {
        $dt = Disposisi::join('suratmasuk', 'disposisi.s_masuk_id', '=', 'suratmasuk.id')->select('disposisi.*','suratmasuk.asal_surat','suratmasuk.isi_surat','suratmasuk.no_surat')->where('disposisi.id',$disposisi->id)->first();
        return view('disposisi.print',['id_surat' => $sMasuk->id,'title' => 'Disposisi_'.$dt->no_surat.'_'.$dt->tujuan],compact('dt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SMasuk  $sMasuk
     * @return \Illuminate\Http\Response
     */
    public function edit(SMasuk $sMasuk)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SMasuk  $sMasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SMasuk $sMasuk)
    {
        //$data = \App\File::findOrFail($sMasuk->id);
        if(empty($request->file('lampiran'))){
            $newName = $sMasuk->lampiran;
        }else{
            if(File::exists('uploads/file/'.$sMasuk->lampiran)) {
                unlink('uploads/file/'.$sMasuk->lampiran);
            }
            $lampiran = $request->file('lampiran');
            $ext = $lampiran->getClientOriginalExtension();
            $ext = Str::lower($ext);
            $newName = rand(1000000,1001238912).".".$ext;
            $lampiran->move('uploads/file',$newName);
        }
        $post = ($request->except(['lampiran']));
        $post['lampiran'] = $newName;

        SMasuk::where('id',$sMasuk->id)
            ->update([
                'no_surat' => $post['no_surat'],
                'class' => $post['class'],
                'asal_surat' => $post['asal_surat'],
                'tujuan_surat' => $post['tujuan_surat'],
                'tanggal_surat' => $post['tanggal_surat'],
                'isi_surat' => $post['isi_surat'],
                'keterangan' => $post['keterangan'],
                'sifat' => $post['sifat'],
                'lampiran' => $post['lampiran'],
                
            ]);
        return back()->with('status','Data Surat Berhasil Diubah!');
    }

    public function foreign_update(Request $request, SMasuk $sMasuk, Disposisi $disposisi)
    {
        SMasuk::find($sMasuk->id)->disposisi()->where('id',$disposisi->id)->update([
            'tujuan' => $request['tujuan'],
            'isi_disposisi' => $request['isi_disposisi'],
            'sifat' => $request['sifat'],
            'batas_waktu' => $request['batas_waktu'],
            'catatan' => $request['catatan'],
        ]);

        return back()->with('status','Data Disposisi Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SMasuk  $sMasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(SMasuk $sMasuk)
    {
        if(File::exists('uploads/file/'.$sMasuk->lampiran)) {
            unlink('uploads/file/'.$sMasuk->lampiran);
        }
        SMasuk::destroy($sMasuk->id);
        return back()->with('status','Data Surat Berhasil Dihapus!');
    }

    public function foreign_destroy(SMasuk $sMasuk, Disposisi $disposisi)
    {
        SMasuk::find($sMasuk->id)->disposisi()->where('id',$disposisi->id)->delete();
        return back()->with('status','Data Disposisi Berhasil Dihapus!');
    }

}
