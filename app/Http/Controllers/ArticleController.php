<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexArticle($id)
    {

        $articles = Article::where('author_id', $id)->orderBy('created_at', 'desc')->paginate(5);
        return response()->view('cms.article.index', compact('articles','id'));
    }


    public function createArticle($id)
    {

        $categories = Category::all();
        return response()->view('cms.article.create', compact('categories','id' ));
    }

    public function index()
    {
        $articles = Article::orderBy('id','desc')->simplePaginate(5);
        return response()->view('cms.article.indexall',compact('articles'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return response()->view('cms.article.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(),[

        ]);
        if(!$validator->fails()){
            $articles= new Article();
            $articles->title = $request->get('title');
            $articles->short_description = $request->get('short_description');
            $articles->full_description = $request->get('full_description');
            $articles->category_id = $request->get('category_id');
            $articles->author_id = $request->get('author_id');

            $isSaved = $articles->save();

            if($isSaved){

                return response()->json(['icon'=>'success' , 'title' => 'created successfully' ] , 200);
            }else {

                return response()->json(['icon'=>'error' , 'title' => 'created failed' ] , 400);

            };

        } else {

            return response()->json(['icon'=>'error' , 'title'=>$validator->getMessageBag()->first() ] ,400 );
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articles = Article::findorFail($id);
        $categories = Category::all();
        return response()->view('cms.article.edit',compact('articles' ,  'categories' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator($request->all(),[

        ]);
        if(!$validator->fails()){
            $articles= Article::findOrFail($id);
            $articles->title = $request->get('title');
            $articles->short_description = $request->get('short_description');
            $articles->full_description = $request->get('full_description');
            $articles->category_id = $request->get('category_id');
            $articles->author_id = $request->get('author_id');

            $isSaved = $articles->save();
            return ['redirect' => route('indexArticle' , $articles->author_id)];


            if($isSaved){

                return response()->json(['icon'=>'success' , 'title' => 'created successfully' ] , 200);
            }else {

                return response()->json(['icon'=>'error' , 'title' => 'created failed' ] , 400);

            };

        } else {

            return response()->json(['icon'=>'error' , 'title'=>$validator->getMessageBag()->first() ] ,400 );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articles = Article::destroy($id);
    }
}
