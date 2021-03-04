<?php

namespace App\Http\Controllers;

use App\SMasuk;
use App\SKeluar;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index_smasuk()
    {
        $surat = 'Masuk';
        return view('agenda.index',['surats' => $surat,'title' => 'Agenda Surat Masuk']);
    }

    public function index_skeluar()
    {
        $surat = 'Keluar';
        return view('agenda.index',['surats' => $surat,'title' => 'Agenda Surat Keluar']);
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
        //
    }

    public function suratmasuk(Request $request)
    {
        $request->validate([
            'dari' => ['required'],
            'sampai' => ['required'],
        ]);

        $surat = 'Masuk';
        $data = SMasuk::whereDate('tanggal_diterima','>=',$request->dari)->whereDate('tanggal_diterima','<=',$request->sampai)->get();
        return view('agenda.index',['surats' => $surat,'title' => 'Agenda_'.$request->dari.'-'.$request->sampai],compact('data'));
    }

    public function suratkeluar(Request $request)
    {
        $request->validate([
            'dari' => ['required'],
            'sampai' => ['required'],
        ]);
        
        $surat = 'Keluar';
        $data = SKeluar::whereDate('tanggal_diterima','>=',$request->dari)->whereDate('tanggal_diterima','<=',$request->sampai)->get();
        return view('agenda.index',['surats' => $surat,'title' => 'Agenda_'.$request->dari.'-'.$request->sampai],compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SMasuk  $sMasuk
     * @return \Illuminate\Http\Response
     */
    public function show(SMasuk $sMasuk)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SMasuk  $sMasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(SMasuk $sMasuk)
    {
        //
    }
}
