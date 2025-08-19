<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    // Nama tabel (opsional kalau sudah sesuai konvensi plural Laravel: suppliers)
    protected $table = 'suppliers';

    // Field yang boleh diisi mass assignment
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
    ];
}
