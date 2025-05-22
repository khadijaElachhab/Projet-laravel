<?php
namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::where('user_id', Auth::id())->get();
        return view('skills.index', compact('skills'));
    }

    public function create()
    {
        return view('skills.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Skill::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'level' => 0,
        ]);
        return redirect()->route('skills.index')->with('success', 'Compétence ajoutée !');
    }

    public function edit(Skill $skill)
    {
        if ($skill->user_id !== Auth::id()) {
            abort(403);
        }
        return view('skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        if ($skill->user_id !== Auth::id()) {
            abort(403);
        }
        $request->validate([
            'name' => 'required',
            'level' => 'required|integer|min:0|max:100'
        ]);
        $skill->update($request->only(['name', 'level']));
        return redirect()->route('skills.index')->with('success', 'Compétence modifiée !');
    }

    public function destroy(Skill $skill)
    {
        if ($skill->user_id !== Auth::id()) {
            abort(403);
        }
        $skill->delete();
        return redirect()->route('skills.index')->with('success', 'Compétence supprimée !');
    }
} 