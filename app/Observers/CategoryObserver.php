<?php

namespace App\Observers;

use App\Models\Category;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class CategoryObserver
{
    public function created(Category $category)
    {
        ActivityLog::create([
            'user_id' => Auth::id() ?? 1, // fallback admin
            'deskripsi' => 'Menambahkan kategori ' . $category->name,
        ]);
    }

    public function updated(Category $category)
    {
        ActivityLog::create([
            'user_id' => Auth::id() ?? 1,
            'deskripsi' => 'Memperbarui kategori ' . $category->name,
        ]);
    }

    public function deleted(Category $category)
    {
        ActivityLog::create([
            'user_id' => Auth::id() ?? 1,
            'deskripsi' => 'Menghapus kategori ' . $category->name,
        ]);
    }
}
