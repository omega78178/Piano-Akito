<?php

namespace App\Http\Controllers;

use App\Models\Sheet;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sheet = Sheet::findOrFail($id);
        return view('sheets.show', compact('sheet'));
    }

    public function search(Request $request): Factory|View
    {
        $query = $request->input('q');
        $sheets = Sheet::where('title', 'like', '%' . $query . '%')->get();
        return view('sheets.index', compact('sheets'));
    }

}
