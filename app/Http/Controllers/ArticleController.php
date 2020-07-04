<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests\StoreArticleRequest;

class ArticleController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        // fetch data
        // Eloquent ORM (database)
        $articles = Article::orderBy('id', 'DESC')->paginate(config('app.page_limit'));

        return view('articles.index')->with(compact('articles'));
    }

    // display new article form
    public function create()
    {
        return view('articles.create');
    }

    // store article into database
    public function store(StoreArticleRequest $request)
    {
        $article = Article::create($request->all());

        return redirect()->route('article.index');
    }

    public function edit(Article $article)
    {
        return view('articles.edit')->with(compact('article'));
    }

    public function update(Article $article, StoreArticleRequest $request)
    {
        $article->update($request->all());

        return redirect()->route('article.index');
    }

    public function delete(Article $article)
    {
        $article->delete();

        // articles/delete/102 ---> articles
        // return redirect()->route('article.index');
        return back();
    }

    public function search()
    {
        $articles = Article::where('title', 'LIKE', '%' . request()->keyword . '%')->orWhere('body', 'LIKE', '%' . request()->keyword . '%')->paginate(config('app.page_limit'));

        return view('articles.index')->with(compact('articles'));
    }
}
