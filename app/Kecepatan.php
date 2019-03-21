<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecepatan extends Model
{
    protected $fillable = ['kecepatan','supir_id'];
    
    public function supir()
    {
        return $this->belongsTo('App\Supir');
    }
    public function bus()
    {
        return $this->belongsTo('App\Bus');
    }
}
