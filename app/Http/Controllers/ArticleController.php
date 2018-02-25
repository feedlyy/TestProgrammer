<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $article = Article::all();
        return view('article.article')->with('article', $article);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('article.TambahArticle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validasi = $request->validate([
           'judul' => ['required', 'unique:articles,judul_article', 'max:255'],
            'isi' => ['required', 'max:255']
        ]);

        $article = new Article;
        $article->judul_article = $request->judul;
        $article->isi_article = $request->isi;
        $article->save();

        return redirect('tes/article')->with(session()->flash('status', ''));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $article = Article::find($id);
        $all = Article::all();
        /*return view('article.ShowArticle', ['article' => Article::find($id)]);*/
        return view('article.ShowArticle')->with('article', $article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $article = Article::find($id);
        return view('article.EditArticle')->with('article', $article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validasi = $request->validate([
            'judul' => ['required', 'unique:articles,judul_article', 'max:255'],
            'isi' => ['required', 'max:255']
        ]);

        $article = Article::find($id);
        $article->judul_article = $request->judul;
        $article->isi_article = $request->isi;
        $article->save();

        return redirect('tes/article')->with(session()->flash('update', ''));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $article = Article::find($id);
        $article->delete();

        return redirect('tes/article')->with(session()->flash('hapus', ''));
    }
}
