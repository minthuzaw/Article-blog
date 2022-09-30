<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ArticleController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth')->except(['index', 'detail']);
    }

    public function index()
    {
        $articles = Article::query()->latest()->paginate(10);

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

    public function store(Article $article, Request $request)
    {
        $validator = validator($request->all(), [
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $path = 'qrcodes/';
        $filename = request()->title;
        $fullpath = $path . $filename . '.png';
        if (!file_exists($path)) {
            mkdir($path, 0770, true);
        }
//        $pic = file_get_contents('images/bob-logo.svg');
//        dd($pic);
        QrCode::format('png')->size(2000)
            ->mergeString(file_get_contents('images/bob1.jpg'), .5)
            ->generate(route('qr', request()->title), $fullpath);
        $article->title = request()->title;
        $article->body = request()->body;
        $article->category_id = request()->category_id;
        $article->user_id = Auth::id();
        $article->qr_code = $fullpath;
        $article->save();

        return redirect()->route('articles.index')->with('success', 'Article created successfully!');
    }

    public function destroy(Article $article)
    {

        $article->delete();

        return redirect()->route('articles.index')->with('info', 'Article deleted');
    }
}
