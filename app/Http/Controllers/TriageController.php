<?php

namespace App\Http\Controllers;

use App\Models\Triages;
use Illuminate\Http\Request;

class TriageController extends Controller
{
    // Index - List all triages
    public function index()
    {
        $triages = Triages::all();
        return view('utama.triages.index', compact('triages'));
    }

    // Store - Create new triage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'priority_score' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        Triages::create($validated);

        return redirect()->route('triages.index')->with('success', 'Triage created successfully.');
    }

    public function show($id)
    {
        $triage = Triages::findOrFail($id);
        return view('utama.triages.show', compact('triage')); // Buatkan view show kalau dibutuhkan
    }

    public function update(Request $request, $id)
    {
        $triage = Triages::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'priority_score' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $triage->update($validated);

        return redirect()->route('triages.index')->with('success', 'Triage updated successfully.');
    }

    public function destroy($id)
    {
        $triage = Triages::findOrFail($id);
        $triage->delete();

        return redirect()->route('triages.index')->with('success', 'Triage deleted successfully.');
    }
}

