<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('articles.index', ['articles' => Article::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = \App\Models\Author::all();
        return view('articles.create', ['authors' => $authors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'authors' => 'required|array'
        ]);

        $article = new Article;
        $article->title = $request->title;
        $article->content = $request->content;
        $article->save();
        $article->authors()->attach($request->authors);

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $authors = \App\Models\Author::all();
        return view('articles.edit', ['article' => $article, 'authors' => $authors]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'authors' => 'required|array'
        ]);

        $article->title = $request->title;
        $article->content = $request->content;
        // changing from two to one author leaves both auth authors
        //$article->authors()->attach(collect($request->authors)->diff($article->authors->pluck('id')));
        $article->authors()->detach();
        $article->authors()->attach($request->authors);
        $article->save();

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->back();
    }
}
