<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwals extends Model
{
    use HasFactory;
    protected $guarded = ['mana'];

    public function Kontraks_matakuliah()
    {
        return $this->belongsTo('App\Models\Matakuliahs');
    }
}
