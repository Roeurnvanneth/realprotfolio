<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::orderByDesc('start_date')->get();

        return view('admin.experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experiences.form', ['experience' => new Experience()]);
    }

    public function store(Request $request)
    {
        Experience::create($this->validateData($request));

        return redirect()->route('admin.experiences.index')->with('status', 'Experience added.');
    }

    public function edit(Experience $experience)
    {
        return view('admin.experiences.form', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $experience->update($this->validateData($request));

        return redirect()->route('admin.experiences.index')->with('status', 'Experience updated.');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();

        return back()->with('status', 'Experience deleted.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'position' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
        ]);
    }
}
