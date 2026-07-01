<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->get();

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.form', ['testimonial' => new Testimonial()]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);

        if ($request->hasFile('client_image')) {
            $data['client_image'] = $request->file('client_image')->store('testimonials', 'public');
        }

        Testimonial::create($data);

        return redirect()->route('admin.testimonials.index')->with('status', 'Testimonial added.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.form', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $this->validateData($request);

        if ($request->hasFile('client_image')) {
            $data['client_image'] = $request->file('client_image')->store('testimonials', 'public');
        }

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')->with('status', 'Testimonial updated.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return back()->with('status', 'Testimonial deleted.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'client_name' => 'required|string|max:255',
            'client_position' => 'nullable|string|max:255',
            'message' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'client_image' => 'nullable|image|max:2048',
        ]);
    }
}
