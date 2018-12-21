<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penumpang extends Model
{
    protected $fillable = ['naik_pelajar', 'naik_umum','turun_pelajar','turun_umum','lokasi','jumlah','bus_id','supir_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function supir()
    {
        return $this->belongsTo('App\Supir');
    }
    public function bus()
    {
        return $this->belongsTo('App\Bus');
    }
}
