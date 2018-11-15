<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecepatan extends Model
{
    protected $fillable = ['kecepatan', 'bus_id','supir_id'];
}
