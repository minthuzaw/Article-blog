<?php

namespace App\Http\Controllers;

use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function qr($qr)
    {
        $name = Article::where('title', $qr)->first();
        $name->count += 1;
        $name->save();

        return redirect()->route('home.index');
    }
}
