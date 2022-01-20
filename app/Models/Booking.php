<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['kode_booking', 'tanggal_order', 'durasi', 'tanggal_pengembalian', 'total_price', 'mobil_id', 'client_id', 'total_price', 'dikembalikan'];
}
