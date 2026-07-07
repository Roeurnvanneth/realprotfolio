<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\ContactMessage;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Skill;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    private function settings(): array
    {
        return [
            'site_title'    => Setting::get('site_title', 'My Port'),
            'site_tagline'  => Setting::get('site_tagline', ''),
            'footer_text'   => Setting::get('footer_text', ''),
            'contact_email' => Setting::get('contact_email', ''),
        ];
    }

    public function home()
    {
        return view('home', [
            'about'        => About::first(),
            'skills'       => Skill::orderBy('sort_order')->get(),
            'experiences'  => Experience::orderByDesc('start_date')->get(),
            'education'    => Education::orderByDesc('start_date')->get(),
            'services'     => Service::orderBy('sort_order')->get(),
            'projects'     => Project::with('category')->orderByDesc('featured')->orderByDesc('created_at')->get(),
            'testimonials' => Testimonial::latest()->get(),
            'settings'     => $this->settings(),
        ]);
    }

    public function about()
    {
        return view('pages.about', [
            'about'    => About::first(),
            'settings' => $this->settings(),
        ]);
    }

    public function skills()
    {
        return view('pages.skills', [
            'skills'   => Skill::orderBy('sort_order')->get(),
            'settings' => $this->settings(),
        ]);
    }

    public function projects()
    {
        return view('pages.projects', [
            'projects'   => Project::with('category')->orderByDesc('featured')->get(),
            'settings'   => $this->settings(),
        ]);
    }

    public function services()
    {
        return view('pages.services', [
            'services' => Service::orderBy('sort_order')->get(),
            'settings' => $this->settings(),
        ]);
    }

    public function contact()
    {
        return view('pages.contact', [
            'settings' => $this->settings(),
        ]);
    }

    public function contactStore(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:5000',
        ]);
        
        ContactMessage::create($data);

        return back()->with('status', 'Thanks! Your message has been sent.');
    }
}