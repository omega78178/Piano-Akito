<?php

namespace App\Http\Controllers;

use App\Models\Sheet;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SheetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|View
    {
        $sheets = Sheet::all();
        return view('sheets.index', compact('sheets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory|View
    {
        return view('sheets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|max:255',
            'difficulty' => 'required',
            'pdf' => 'required|mimes:pdf|max:10000',
        ]);

        $pdfPath = $request->file('pdf')->store('sheets', 'public');

        Sheet::create([
            'title' => $request->title,
            'difficulty' => $request->difficulty,
            'pdf' => $pdfPath,
        ]);

        return redirect()->route('sheets.index')->with('success', 'Sheet succesvol toegevoegd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sheet = Sheet::findOrFail($id);
        return view('sheets.show', compact('sheet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sheet = Sheet::findOrFail($id);
        return view('sheets.edit', compact('sheet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $sheet = Sheet::findOrFail($id);
        $request->validate([
            'title' => 'required|max:255',
            'difficulty' => 'required',
            'pdf' => 'nullable|mimes:pdf|max:10000',
        ]);

        $sheet->title = $request->title;
        $sheet->difficulty = $request->difficulty;

        if ($request->hasFile('pdf')) {
            // Optioneel: oud bestand verwijderen
            if ($sheet->pdf && Storage::disk('public')->exists($sheet->pdf)) {
                Storage::disk('public')->delete($sheet->pdf);
            }
            $sheet->pdf = $request->file('pdf')->store('sheets', 'public');
        }

        $sheet->save();
        return redirect()->route('sheets.index')->with('success', 'Sheet succesvol bijgewerkt!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $sheet = Sheet::findOrFail($id);
        if ($sheet->pdf && Storage::disk('public')->exists($sheet->pdf)) {
            Storage::disk('public')->delete($sheet->pdf);
        }
        $sheet->delete();
        return redirect()->route('sheets.index')->with('success', 'Sheet verwijderd!');
    }

    public function search(Request $request): Factory|View
    {
        $query = $request->input('q');
        $sheets = Sheet::where('title', 'like', "%$query%")->get();
        return view('sheets.index', compact('sheets'));
    }

}
