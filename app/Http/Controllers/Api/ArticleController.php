<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use F9Web\ApiResponseHelpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    use ApiResponseHelpers;

    /**
     * Index
     *
     * @group Article
     */
    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->get();

        return $this->respondWithSuccess($articles);
        /*$articles = Article::orderBy('id', 'desc')->get();

        return response()->json([
            'status' => 200,
            'data' => [
                'article' => $articles,
            ],
        ]);*/
    }

    /**
     * Store
     *
     * @group Article
     *
     * @bodyParam title string required The title of the article. Example: Title
     * @bodyParam body string required The title of the article. Example: Description
     * @bodyParam category int required The title of the article. Example: 1
     */
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
            'data' => [
                'message' => 'Article Created Successful',
                'article' => $article,
            ],
        ]);
    }

    /**
     * Update
     *
     * @group Article
     */
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
            'data' => [
                'message' => 'Article Updated Successful',
                'category' => $article,
            ],
        ]);
    }

    /**
     * Destroy
     *
     * @group Article
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return response()->json([
            'status' => 200,
            'data' => [
                'message' => 'Article Deleted Successful',
            ],
        ]);
    }
}
