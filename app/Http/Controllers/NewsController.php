<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|View
    {
        $news = News::orderByDesc('publish_date')->get(); // of News::all();
        return view('news.index', compact('news'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'publish_date' => 'required|date',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        News::create($validated);

        return redirect()->route('news.index')->with('success', 'Nieuws toegevoegd!');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = News::findOrFail($id);
        return view('news.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = News::findOrFail($id);
        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        $news = News::findOrFail($id);

        // Handle image upload if present
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        $news->update($validated);
        $news->save();

        return redirect()->route('news.index')->with('success', 'Nieuwsbericht bijgewerkt!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()
            ->route('news.index')
            ->with('success', 'Het nieuwsbericht is verwijderd!');
    }
}
