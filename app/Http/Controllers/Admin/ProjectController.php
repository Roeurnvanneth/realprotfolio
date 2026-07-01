<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('category')->latest()->get();

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.projects.form', ['project' => new Project(), 'categories' => $categories]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['slug'] = $this->uniqueSlug($data['title']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        Project::create($data);

        return redirect()->route('admin.projects.index')->with('status', 'Project added.');
    }

    public function edit(Project $project)
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.projects.form', compact('project', 'categories'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $this->validateData($request);

        if ($data['title'] !== $project->title) {
            $data['slug'] = $this->uniqueSlug($data['title'], $project->id);
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('status', 'Project updated.');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return back()->with('status', 'Project deleted.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'project_url' => 'nullable|url|max:255',
            'github_url' => 'nullable|url|max:255',
            'technologies' => 'nullable|string|max:255',
            'featured' => 'nullable|boolean',
            'image' => 'nullable|image|max:2048',
        ]);
    }

    private function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $slug = Str::slug($title);
        $base = $slug;
        $i = 1;

        while (Project::where('slug', $slug)->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $base.'-'.$i++;
        }

        return $slug;
    }
}
