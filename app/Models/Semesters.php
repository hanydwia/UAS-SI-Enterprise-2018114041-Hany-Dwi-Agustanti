<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class semesters extends Model
{
    use HasFactory;

    protected $guarded = ['name'];

    public function semesters()
    {
        return $this->hasMany('App\Models\Semesters');
    }
}
