<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $guarded = ['id'];

    public function kendaraan()
    {
        return $this->hasMany(Kendaraan::class);
    }

    public function getRouteKeyName()
    {
        return 'kode_kategori';
    }
}
