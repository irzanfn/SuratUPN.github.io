<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    protected $table = 'disposisi';
    protected $fillable = ['tujuan','isi_disposisi','sifat','batas_waktu','catatan','s_masuk_id','user_id'];

    public function sMasuk()
    {
        return $this->belongsTo('App\SMasuk', 'id_surat');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
