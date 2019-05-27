<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index(Request $request, $article_slug = null)
    {
        if ($article_slug) {
            $article = Article::with(['comments' => function ($query) {
                $query->take(5)->get();
            }])->whereSlug($article_slug)->first();
            return view('articles.show', compact('article'));

        } else {
            $articles = Article::whereStatus(1)->whereLocale(app()->getLocale())->get();
            return view('articles.index', compact('articles'));
        }
    }
}
