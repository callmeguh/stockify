<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    /**
     * Menampilkan daftar log aktivitas
     */
    public function index()
    {
        $logs = ActivityLog::with('user')->latest()->paginate(20);
        return view('pages.activity_logs.index', compact('logs'));
    }

    /**
     * Menghapus satu log
     */
    public function destroy(ActivityLog $activityLog)
    {
        $activityLog->delete();
        return redirect()->route('activity_logs.index')
                         ->with('success', 'Log aktivitas berhasil dihapus!');
    }

    /**
     * Menghapus semua log
     */
    public function clearAll()
    {
        ActivityLog::truncate();
        return redirect()->route('activity_logs.index')
                         ->with('success', 'Semua log aktivitas berhasil dihapus!');
    }
}
