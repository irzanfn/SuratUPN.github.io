<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SMasuk extends Model
{
    protected $table = 'suratmasuk';
    protected $fillable = ['no_surat','asal_surat','class','tujuan_surat','tanggal_surat','tanggal_diterima','isi_surat','keterangan','lampiran','user_id','sifat'];

    public function disposisi()
    {
        return $this->hasMany('App\Disposisi');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
