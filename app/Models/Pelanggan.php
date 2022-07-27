<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    // field apa saja yang bisa di isi
    public $fillable = ['nama', 'email', 'no_telepon', 'alamat', 'password'];
    // membuat fitur created_at(kapan data dibuat) & updated_at (kapan data diedit)
    // aktif
    public $timestamps = true;
}
