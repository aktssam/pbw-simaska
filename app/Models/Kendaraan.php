<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $table = 'kendaraan';
    protected $guarded = ['id'];
    protected $with = ['department', 'kategori'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function getRouteKeyName()
    {
        return 'nopol';
    }
}
