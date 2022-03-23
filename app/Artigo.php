<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artigo extends Model
{
    public $timestamps = false;
    protected $fillable = ['titulo', 'texto'];
}
