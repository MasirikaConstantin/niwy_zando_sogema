<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\articleCategorie;
use App\Models\CategorieArticle;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ArticleResource;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Database\Eloquent\Builder;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('nom', "ASC")->get();
        //$articles = articleCategorie::orderBy('nom', "ASC")->get();
        //$categories = CategorieArticle::orderBy('nom', "ASC")->get();
        return view('pages.articles.index', compact('articles'));
    }

    public function getAllArticles(){
        //$articles = Article::orderBy('nom', 'ASC')->get();
        //$articles = ArticleResource::collection(Article::orderBy('nom', 'ASC')->get());
        //$articles = articleCategorie::orderBy('nom', "ASC")->get();
        //return $articles;

        // $articles = DB::table('articles')
        //             ->join('emplacements', 'articles.id', '=', 'emplacements.article_id')
        //             ->select('articles.*','emplacements.*')
        //             ->get();
        $articles = Article::with(['emplacements' => function ($query) {
            $query->where('etat', 0);
        }])->orderBy('nom', "ASC")->get();
        return $articles;
    }

    public function store(Request $request){
        $validator = $request->validate([
            'nom' => 'required',
        ]);

        try {
            $article = new Article();
            //$article = new articleCategorie();
            $article->nom = $request->nom;
            //$article->categorie_id = $request->categorieId;
            //$article->user_id = Auth::user()->id;
            $article->save_by = Auth::user()->id;
            $article->save();
            if ($article) {
                toastr()->success("Article enregistré avec success!");
                return back();//->with('success', "Article enregistré avec success!");
            } else {
                toastr()->error("Erreur lors de l'enregistrement! essayer a nouveau!");
                return back();//->with('error', "Erreur lors de l'enregistrement! essayer a nouveau!");
            }
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return back()->with('error', $bug);
        }
    }

    public function update(Request $request, $id){
        $validator = $request->validate([
            'nom' => 'required',
        ]);

        try {
            $article = Article::find($id);
            //$article = articleCategorie::find($id);
            if($article == null){
                return back()->with('error', "Impossible de traiter cette requête!");
            }
            $article->nom = $request->nom;
            //$article->categorie_id = $request->categorieId;
            //$article->user_id = Auth::user()->id;
            $article->save_by = Auth::user()->id;
            $article->save();
            if ($article) {
                return back()->with('success', "Article modifié avec succès " .$request->nom );
            } else {
                return back()->with('error', 'Erreur lors de la modification! essayer a nouveau');
            }
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    public function destroy($id)
    {
        try {
            $article = Article::find($id);
            //$article = articleCategorie::find($id);
            if($article == null){
                return back()->with('error', "Impossible de traiter cette requête!");
            }
            $article->delete();
            if ($article) {
                return redirect()->route('article.index')->with('success', "Article supprimé avec succès ");
            } else {
                return redirect()->route('article.index')->with('error', 'Erreur lors de la suppresion! essayer a nouveau');
            }
        }catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    public function search(Request $request){
        $articles = Article::where('nom', 'LIKE', '%' . $request->q . '%')->orderBy('nom', "ASC")->get();
        //$articles = articleCategorie::where('nom', 'LIKE', '%' . $request->q . '%')->orderBy('nom', "ASC")->get();
        return view('pages.articles.index', compact('articles'));
    }
}
