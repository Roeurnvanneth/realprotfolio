<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::orderByDesc('start_date')->get();

        return view('admin.education.index', compact('educations'));
    }

    public function create()
    {
        return view('admin.education.form', ['education' => new Education()]);
    }

    public function store(Request $request)
    {
        Education::create($this->validateData($request));

        return redirect()->route('admin.education.index')->with('status', 'Education added.');
    }

    public function edit(Education $education)
    {
        return view('admin.education.form', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $education->update($this->validateData($request));

        return redirect()->route('admin.education.index')->with('status', 'Education updated.');
    }

    public function destroy(Education $education)
    {
        $education->delete();

        return back()->with('status', 'Education deleted.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'school' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'field_of_study' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
        ]);
    }
}
