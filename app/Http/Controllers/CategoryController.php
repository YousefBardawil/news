<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('articles')->withCount('articles')->orderBy('id','desc')->simplePaginate(5);
        return response()->view('cms.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.category.create');

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
            'name' => 'required|String|min:3|max:20',
            'description' => 'required|String',

           ]);

           if(!$validator->fails()){
               $categories= new Category();
               $categories->name = $request->get('name');
               $categories->description = $request->get('description');
               $isSaved = $categories->save();

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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::findorFail($id);

        return response()->view('cms.category.edit' , compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(),[
            'name' => 'required|String|min:3|max:20',
            'description' => 'required|String',

           ]);

           if(!$validator->fails()){
               $categories= Category::findOrFail($id);
               $categories->name = $request->get('name');
               $categories->description = $request->get('description');
               $isUpdated = $categories->save();

               return ['redirect' => route('categories.index' , $id)];


               if($isUpdated){

                   return response()->json(['icon'=>'success' , 'title' => 'updated successfully' ] , 200);
               }else {

                   return response()->json(['icon'=>'error' , 'title' => 'updated failed' ] , 400);

               };

           } else {

               return response()->json(['icon'=>'error' , 'title'=>$validator->getMessageBag()->first() ] ,400 );
           }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Category::destroy($id);
    }
}
