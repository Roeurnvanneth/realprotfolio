<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    // ================= EDIT PAGE =================
    public function edit()
    {
        $about = About::first() ?? new About();

        return view('admin.about.edit', compact('about'));
    }

    // ================= UPDATE =================
    public function update(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'title'     => 'nullable|string|max:255',
            'bio'       => 'nullable|string',
            'email'     => 'nullable|email|max:255',
            'phone'     => 'nullable|string|max:50',
            'address'   => 'nullable|string|max:255',
            'facebook'  => 'nullable|url|max:255',
            'linkedin'  => 'nullable|url|max:255',
            'github'    => 'nullable|url|max:255',
            'twitter'   => 'nullable|url|max:255',
            'avatar'    => 'nullable|image|max:2048',
            'cv_file'   => 'nullable|file|mimes:pdf|max:5120',
        ]);

        $about = About::first();
        if (!$about) {
            $about = new About();
        }

        $about->name     = $request->name;
        $about->title    = $request->title;
        $about->bio      = $request->bio;
        $about->email    = $request->email;
        $about->phone    = $request->phone;
        $about->address  = $request->address;
        $about->facebook = $request->facebook;
        $about->linkedin = $request->linkedin;
        $about->github   = $request->github;
        $about->twitter  = $request->twitter;

        // ================= AVATAR IMAGE =================
        if ($request->hasFile('avatar')) {
            if ($about->avatar && Storage::disk('public')->exists($about->avatar)) {
                Storage::disk('public')->delete($about->avatar);
            }

            $file = $request->file('avatar');
            $filename = time().'_'.$file->getClientOriginalName();
            $path = $file->storeAs('about/avatar', $filename, 'public');

            $about->avatar = $path;
        }

        // ================= CV FILE =================
        if ($request->hasFile('cv_file')) {
            if ($about->cv_file && Storage::disk('public')->exists($about->cv_file)) {
                Storage::disk('public')->delete($about->cv_file);
            }

            $file = $request->file('cv_file');
            $filename = time().'_'.$file->getClientOriginalName();
            $path = $file->storeAs('about/cv', $filename, 'public');

            $about->cv_file = $path;
        }

        $about->save();

        return back()->with('status', 'About info updated successfully.'); // ✏️ ប្តូរ 'success' → 'status'
    }
}