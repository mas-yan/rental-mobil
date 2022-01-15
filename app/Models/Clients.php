<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getFotoAttribute($foto)
    {
        return asset('storage/client/' . basename($foto));
    }

    public function setFotoAttribute($foto)
    {
        $foto->storeAs('public/client', $foto->hashName());
        return $this->attributes['foto'] = $foto->hashName();
    }
}
