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

        $triage = Triages::create($validated);

        return response()->json([
            'message' => 'Triage created successfully.',
            'data' => $triage,
        ]);
    }

    // Show - Get a single triage by ID
    public function show($id)
    {
        $triage = Triages::findOrFail($id);
        return response()->json($triage);
    }

    // Update - Update existing triage
    public function update(Request $request, $id)
    {
        $triage = Triages::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'priority_score' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $triage->update($validated);

        return response()->json([
            'message' => 'Triage updated successfully.',
            'data' => $triage,
        ]);
    }

    // Destroy - Delete a triage
    public function destroy($id)
    {
        $triage = Triages::findOrFail($id);
        $triage->delete();

        return response()->json([
            'message' => 'Triage deleted successfully.'
        ]);
    }
}

