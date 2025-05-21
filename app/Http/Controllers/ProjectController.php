<?php
namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('user_id', Auth::id())->get();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $project = Project::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect()->route('projects.index')->with('success', 'Projet ajouté !');
    }

    public function edit(Project $project)
    {
        if ($project->user_id !== Auth::id()) {
            abort(403);
        }
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        if ($project->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $project->update($request->only('title', 'description'));

        return redirect()->route('projects.index')->with('success', 'Projet modifié !');
    }

    public function destroy(Project $project)
    {
        if ($project->user_id !== Auth::id()) {
            abort(403);
        }
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Projet supprimé !');
    }

    public function show(Project $project)
    {
        if ($project->user_id !== Auth::id()) {
            abort(403);
        }
        return view('projects.show', compact('project'));
    }
} 