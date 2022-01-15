<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $fillable = ['brand_id', 'foto', 'car_name', 'plat_number', 'price', 'type', 'available'];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function getFotoAttribute($foto)
    {
        return asset('storage/mobil/' . basename($foto));
    }

    public function setFotoAttribute($foto)
    {
        $foto->storeAs('public/mobil', $foto->hashName());
        return $this->attributes['foto'] = $foto->hashName();
    }
}
