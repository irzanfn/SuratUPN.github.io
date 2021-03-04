<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SKeluar extends Model
{
    protected $table = 'suratkeluar';
    protected $fillable = ['no_surat', 'asal_surat', 'class', 'tujuan_surat', 'tanggal_surat', 'tanggal_diterima', 'isi_surat', 'keterangan', 'lampiran', 'user_id'];
}
