<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Author;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::with('user','country')->withCount('articles')->orderBy('id','desc')->simplePaginate(3);

        return response()->view('cms.author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return response()->view('cms.author.create' , compact('countries'));
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
            'first_name' => 'required|String|min:3|max:20',
            // 'code' => 'required|String|min:3|max:20',
            'image' => 'required|image|max:2048|mimes:png,jpg,jpeg,pdf',

           ]);

           if(!$validator->fails()){
               $authors= new Author();
               $authors->email = $request->get('email');
               $authors->password = Hash::make($request->get('password')) ;
               $isSaved = $authors->save();

               if($isSaved){

                $users= new User();

                if(request()->hasFile('image')){
                    $image = $request->file('image');
                    $imageName =time() . 'image.' . $image->getClientOriginalExtension();
                    $image->move('images/author', $imageName);
                    $users->image = $imageName;
                }

                $users->first_name = $request->get('first_name');
                $users->last_name = $request->get('last_name');
                $users->mobile = $request->get('mobile');
                $users->gender = $request->get('gender');
                $users->status = $request->get('status');
                $users->date_of_birth = $request->get('date_of_birth');
                $users->country_id = $request->get('country_id');
                $users->actor()->associate($authors);

                $isSaved=$users->save();
                 return response()->json(['icon'=>'success' , 'title' => $isSaved ? 'created succesfully' : 'created failed' ] , $isSaved ? 200 : 400);
               }
               else {

                return response()->json(['icon'=>'error' , 'title' => 'updated failed' ] , 400);

            }

           }
           else{

               return response()->json(['icon'=>'error' , 'title'=>$validator->getMessageBag()->first() ] ,400 );
           }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $authors = Author::findOrFail($id);
        $countries = Country::all();
        return response()->view('cms.author.show',compact('countries','authors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries= Country::all();
        $authors = Author::findOrFail($id);

        return response()->view('cms.author.edit' , compact('authors','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(),[
            'first_name' => 'required|String|min:3|max:20',
            // 'code' => 'required|String|min:3|max:20',
            'image' => 'required|image|max:2048|mimes:png,jpg,jpeg,pdf',

           ]);

           if(!$validator->fails()){
            $authors= Author::findorFail($id);
            $authors->email = $request->get('email');
            $isSaved = $authors->save();

            if($isSaved){

             $users= $authors->user;

             if(request()->hasFile('image')){
                 $image = $request->file('image');
                 $imageName =time() . 'image.' . $image->getClientOriginalExtension();
                 $image->move('images/author', $imageName);
                 $users->image = $imageName;
             }

             $users->first_name = $request->get('first_name');
             $users->last_name = $request->get('last_name');
             $users->mobile = $request->get('mobile');
             $users->gender = $request->get('gender');
             $users->status = $request->get('status');
             $users->date_of_birth = $request->get('date_of_birth');
             $users->country_id = $request->get('country_id');
             $users->actor()->associate($authors);

             $isSaved=$users->save();
             return ['redirect' => route('authors.index' , $id)];
             return response()->json(['icon'=>'success' , 'title' => $isSaved ? 'updated succesfully' : 'updated filed' ] , $isSaved ? 200 : 400);
         }else {

             return response()->json(['icon'=>'error' , 'title' => 'updated failed' ] , 400);

         }

        } else {

            return response()->json(['icon'=>'error' , 'title'=>$validator->getMessageBag()->first() ] ,400 );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        // $authors = Author::destroy($id);


        if($author->id == Auth::id()){
            return redirect()->route('admins.index')->withErrors(trans('can not delete yourself'));
        }else{
            $author->user()->delete();
            $isDeleted = $author->delete();
            return response()->json(['icon'=> 'success' , 'title' => 'admin deleted successfuly'],200);
        }

    }
}
