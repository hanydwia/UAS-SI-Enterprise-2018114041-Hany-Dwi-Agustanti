<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliahs extends Model
{
    use HasFactory;
    protected $guarded = ['mana'];

    public function matakuliahs()
    {
        return $this->belongsTo('App\Models\jadwals');
    }
}
