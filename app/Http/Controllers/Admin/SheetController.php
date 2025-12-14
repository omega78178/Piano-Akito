<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sheet;
use Illuminate\Http\Request;

class SheetController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        $sheets = Sheet::orderByDesc('created_at')->get();
        return view('admin.sheets.index', compact('sheets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sheets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'difficulty' => 'nullable|string|max:50',
            'pdf'   => 'nullable|file|mimes:pdf|max:6144',
        ]);
        // PDF opslaan indien geüpload
        if ($request->hasFile('pdf')) {
            $validated['pdf'] = $request->file('pdf')->store('sheets', 'public');
        }
        Sheet::create($validated);
        return redirect()->route('admin.sheets.index')->with('success', 'Sheet toegevoegd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sheet = Sheet::findOrFail($id);
        return view('admin.sheets.edit', compact('sheet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sheet = Sheet::findOrFail($id);
        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'difficulty' => 'nullable|string|max:50',
            'pdf'   => 'nullable|file|mimes:pdf|max:6144',
        ]);
        if ($request->hasFile('pdf')) {
            $validated['pdf'] = $request->file('pdf')->store('sheets', 'public');
        }
        $sheet->update($validated);
        return redirect()->route('admin.sheets.index')->with('success', 'Sheet bijgewerkt!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sheet = Sheet::findOrFail($id);
        $sheet->delete();
        return redirect()->route('admin.sheets.index')->with('success', 'Sheet verwijderd!');

    }
}
