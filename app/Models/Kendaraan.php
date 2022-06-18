<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $table = 'kendaraan';
    protected $guarded = 'id';

    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
