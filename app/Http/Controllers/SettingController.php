<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('pages.settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'app_name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
            'favicon' => 'nullable|image|mimes:png,ico|max:1024',
            'description' => 'nullable|string',
        ]);

        $setting = Setting::firstOrNew([]);

        $setting->app_name = $request->app_name;
        $setting->description = $request->description;

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('settings', 'public');
            $setting->logo = $path;
        }

        if ($request->hasFile('favicon')) {
            $path = $request->file('favicon')->store('settings', 'public');
            $setting->favicon = $path;
        }

        $setting->save();

        return redirect()->route('settings.index')->with('success', 'Pengaturan berhasil disimpan.');
    }
}
