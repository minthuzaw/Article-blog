<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function qr($qr)
    {
        $name = Article::where('unique_name', $qr)->firstOrFail();
        $name->visit_count += 1;
        $name->save();

        return redirect()->route('ticket.index')->with(['hotel' => $qr]);
    }

    public function index()
    {
        return view('ticket.index');
    }

    public function check(Request $request)
    {
        if (isset($request->checkbox)) {
            $name = Article::where('unique_name', $request->hotel)->firstOrFail();
            $name->successful_buy += 1;
            $name->save();

            return redirect()->route('articles.index');
        }

        return redirect()->route('articles.index');
    }
}
