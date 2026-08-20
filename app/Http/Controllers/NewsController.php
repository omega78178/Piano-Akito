<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|View
    {
        $news = News::orderByDesc('publish_date')->get();
        return view('news.index', compact('news'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = News::findOrFail($id);
        return view('news.show', compact('post'));
    }
}
