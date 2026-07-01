<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key');

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'site_title' => 'nullable|string|max:255',
            'site_tagline' => 'nullable|string|max:255',
            'footer_text' => 'nullable|string|max:255',
            'contact_email' => 'nullable|email|max:255',
        ]);

        foreach ($data as $key => $value) {
            Setting::set($key, $value);
        }

        return back()->with('status', 'Settings updated.');
    }
}
