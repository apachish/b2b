<?php

namespace App\Http\Controllers;

use App\Article;
use App\Banner;
use App\Comment;
use App\Testimonial;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index(Request $request, $article_slug = null)
    {
        $order_by = $request->order_by?:'DESC';
        $banner_left = Banner::where('banner_position', Banner::BANNER_POSITION_LEFT)->where('status', 1)->orderByRaw('RAND()')->skip(0)->take(6)->get();
        $testimonials = Testimonial::whereStatus(1)->orderBy('created_at', 'desc')->take(10)->get();

        if ($article_slug) {
            $article = Article::with(['comments' => function ($query) use($order_by) {
                $query->take(5)->orderBy('created_at', 'DESC')->get();
            }])->whereSlug($article_slug)->first();
            return view('articles.show', compact('article','banner_left','testimonials'));

        } else {
            $articles = Article::withCount('comments')->whereStatus(1)->whereLocale(app()->getLocale())->orderBy('created_at', $order_by)->simplePaginate(10);
//            if ($request->ajax()) {
//                return response()->json(['articles'=>$articles]);
//            }
            return view('articles.index', compact('articles','order_by','banner_left','testimonials'));

        }
    }

    public function loadComment(Request $request, $article_slug = null)
    {
        $comments = Comment::whereHas('article',function ($q) use ($article_slug){
            $q->where('slug',$article_slug);
        })->skip($request->offset)->take(5)->get();
        return $comments;
    }
}
