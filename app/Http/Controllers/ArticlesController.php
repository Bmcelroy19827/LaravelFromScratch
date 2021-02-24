<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    public function test_policy(Article $article){
        $this->authorize('update', $article);

        dd("Grats, you've made it here without a 403: forbidden error.");
    }

    public function show(Article $article){
        // Show a single resource
            //dd($Id);
            //$article = Article::findOrFail($Id);

            return view('articles.show', ['article' => $article]);
    }

    public function index(){

        if (request('tag')){
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        } else{
            // Render list of resource
            $articles = Article::latest()->get();
        }


         return view('articles.index', ['articles' => $articles]);
    }

    public function create(){
        // Shows a view to create a new resource
        return view('articles.create', [
            'tags' => Tag::all()
        ]);
    }

    public function store(){
            //Persist the new resource
        // dump(request()->all());

        // validation
        // You can store these validated attributes in an array to use for the create method
        // Can refactor further in the create method
        //    $validatedAttributes = request()->validate([
        //         'title' => ['required', 'min:3'],
        //         'excerpt'=> 'required',
        //         'body'=> 'required'
        //    ]);

        //    // Clean up
        //    $article = new Article();
        //    $article->title = request('title');
        //    $article->excerpt = request('excerpt');
        //    $article->body = request('body');
        //    $article->save();

        //    Article::create([
        //        'title' => request('title'),
        //        'excerpt' => request('excerpt'),
        //        'body' => request('body')
        //    ]);

        // // We can inline the validation to remove another line of code 
        // Article::create($validatedAttributes);

        //Article::create($this->validateArticle() );

        $this->validateArticle();
        $article = new Article(request(['title', 'excerpt', 'body']));       
        $article->user_id = 1; // auth()->id()
        $article->save();

        $article->tags()->attach(request('tags'));

       return redirect('/articles');

    }

    public function edit(Article $article){
        // Shows a view for editing an existing resource
        //$article = Article::findOrFail($Id);

        return view('articles.edit', compact('article'));
    }

    public function update(Article $article){//$Id){
       
       $article->update( $this->validateArticle());

       // With the path function added in the eloquent model we can make the below redirect more readable
        //return redirect(route('articles.show', $article));

        return redirect($article->path());
    }

    public function destroy(){
        // Delete the resource
    }

    //Validation is the same for creating and updating so we can extract into a method
    public function validateArticle(){
        return        request()->validate([
            'title' => ['required', 'min:3'],
            'excerpt'=> 'required',
            'body'=> 'required',
            'tags' => 'exists:tags,id'
       ]);
    }

}
