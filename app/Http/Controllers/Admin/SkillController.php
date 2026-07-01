<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('sort_order')->get();

        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.form', ['skill' => new Skill()]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        Skill::create($data);

        return redirect()->route('admin.skills.index')->with('status', 'Skill added.');
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.form', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $data = $this->validateData($request);
        $skill->update($data);

        return redirect()->route('admin.skills.index')->with('status', 'Skill updated.');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();

        return back()->with('status', 'Skill deleted.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'percentage' => 'required|integer|min:0|max:100',
            'category' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);
    }
}
