<?php

namespace Blog\Http\Controllers;

use Blog\Http\Requests\Comment\Create;
use Blog\Http\Requests\Comment\Edit;
use Blog\Http\Requests\Comment\Index;
use Blog\Http\Requests\Comment\Show;
use Blog\Http\Requests\Comment\Store;
use Blog\Http\Requests\Comment\Update;
use Illuminate\Http\Request;

use Auth;
use Blog\Comment;
use Blog\Post;
class CommentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request, $post_id)
    {
        
        $comment = new Comment;        
        $comment->fill($request->all());

        // $comment->manageParentId($request);
        if (!empty($request->parent_id)) {

            $comment->parent_id = $request->parent_id;
        }
        $comment->post_id = $post_id;
        $response=$comment->save();
        if ($response) {
            return redirect()->back()->with('response_message', 'Commented succesfully')->with('result', 'alert-success');
        }else{
            return redirect()->back()->with('response_message', 'Something went wrong. Please try again')->with('result', 'alert-danger');
        }
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, Post $post,  Comment $comment)
    {
        // $comment = new Comment;        
        // $comment = Comment::find($comment);
        $comment->fill($request->all());

        // $comment->manageParentId($request);
        if (!empty($request->parent_id)) {

            $comment->parent_id = $request->parent_id;
        }
        // $comment->post_id = $post_id;
        $response=$comment->save();
        if ($response) {
            return redirect()->back()->with('response_message', 'Commented succesfully')->with('result', 'alert-success');
        }else{
            return redirect()->back()->with('response_message', 'Something went wrong. Please try again')->with('result', 'alert-danger');
        }
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
    }
}
