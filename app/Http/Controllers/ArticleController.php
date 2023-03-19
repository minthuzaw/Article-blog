<?php

namespace App\Http\Controllers;

use App\Helpers\ImageSave;
use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'detail']);
    }

    public function index()
    {
        //->inRandomOrder()
        $articles = Article::latest()->filter(request(['search']))->paginate(12)->withQueryString();

        return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('articles.create', compact('categories'));
    }

    public function store(StoreArticleRequest $request)
    {
        $article = $request->validated();
        $article['user_id'] = Auth::id();
        if ($request->file('image')) {
            $article['image'] = ImageSave::imageSave($request->file('image'));
        }
        Article::create($article);
        return redirect()->route('articles.index')->with('success', 'Article created successfully!');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index')->with('info', 'Article deleted');
    }
}
