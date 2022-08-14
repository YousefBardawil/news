<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::orderBy('id','desc')->simplePaginate(5);
        return response()->view('cms.comment.index' , compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::all();
        return response()->view('cms.comment.create' , compact('posts'));
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
            'comment' => 'required|String|min:3|max:20',

           ]);


           if(!$validator->fails()){
            $comments= new Comment();

            $comments->comment = $request->get('comment');
            $comments->post_id = $request->get('post_id');

            $isSaved = $comments->save();

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
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comments=Comment::findOrFail($id);
        $posts = Post::all();
        return response()->view('cms.comment.edit',compact('comments','posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(),[
            'comment' => 'required|String|min:3|max:20',

           ]);


           if(!$validator->fails()){
            $comments=  Comment::findOrFail($id);
            $comments->comment = $request->get('comment');
            $comments->post_id = $request->get('post_id');
            $isUpdated = $comments->save();

            return ['redirect' => route('comments.index' , $id)];


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
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comments = Comment::destroy($id);
    }
}
