<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    // kalau tabelmu bernama "settings", ini bisa dihapus.
    protected $table = 'settings';

    protected $fillable = [
        'app_name',
        'logo',
        'favicon',
        'description',
        'bg_color',
    ];

    // kalau nanti ada field tambahan, bisa cast otomatis
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
