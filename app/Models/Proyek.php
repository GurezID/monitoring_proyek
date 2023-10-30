<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rencana;
use App\Models\Laporan;

class Proyek extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function rencana()
    {
        return $this->hasMany(Rencana::class);
    }
    public function laporan()
    {
        return $this->hasMany(Laporan::class);
    }
}
