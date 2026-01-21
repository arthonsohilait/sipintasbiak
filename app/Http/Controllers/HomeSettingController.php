<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class HomeSettingController extends Controller
{
    public function index()
    {
        $settings = Setting::whereIn('group', ['home', 'general'])->get()->pluck('value', 'key');
        return view('admin.home.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $settings = Setting::whereIn('group', ['home', 'general'])->get();

        foreach ($settings as $setting) {
            if ($setting->type === 'file' && $request->hasFile($setting->key)) {
                // Delete old file if exists
                if ($setting->value) {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($setting->value);
                }
                
                $path = $request->file($setting->key)->store('settings', 'public');
                $setting->update(['value' => $path]);
            } elseif ($request->has($setting->key)) {
                $setting->update(['value' => $request->get($setting->key)]);
            }
        }

        return redirect()->back()->with('success', 'Pengaturan Beranda berhasil diperbarui!');
    }
}
