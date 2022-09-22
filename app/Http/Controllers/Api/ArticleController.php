<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->get();
        return response()->json([
            'status' => 200,
            'data' => $articles
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
        ]);
        $attributes['user_id'] = Auth::id();

        $article = Article::create($attributes);

        return response()->json([
            'status' => 200,
            'data' => $article
        ]);
    }

    public function update(Article $article, Request $request)
    {
        $attributes = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
        ]);
        $attributes['user_id'] = Auth::id();

        $article = $article->update($attributes);

        return response()->json([
            'status' => 200,
            'data' => $article
        ]);
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return response()->json([
            'status' => 200
        ]);
    }
}
