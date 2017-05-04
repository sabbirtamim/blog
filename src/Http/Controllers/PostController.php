<?php

namespace Blog\Http\Controllers;

use Blog\Http\Requests\Post\Create;
use Blog\Http\Requests\Post\Edit;
use Blog\Http\Requests\Post\Index;
use Blog\Http\Requests\Post\Show;
use Blog\Http\Requests\Post\Store;
use Blog\Http\Requests\Post\Update;
use Illuminate\Http\Request;
use Blog\Http\Requests\CreatepostRequest;

use Auth;
use Blog\User;
use Blog\Term;
use Blog\Post;
use Blog\Notifications\PostNofification;

class PostController extends Controller
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

    public function index(Index $request)
    {
        $posts = Post::paginate(10);
        return view('blog.posts.index')->with('data', $posts);
    }

    public function show(Show $request, $slug)
    {
        $data = Post::GetPostBySlug($slug)->get();
        return view('blog.posts.show')->with('data', $data);
    }


    public function create(Create $request)
    {
        $term = Term::all();
        return view('blog.posts.create')->with('term', $term);
    }

    public function store(Store $request)
    {
        $post = new Post;
        $post->fill($request->all());
        $post->manageTerm($request);
        $post->manageUpload($request);
        $post->comment_status = $request->get('comment_status', 0);
        $post->active = $request->get('active', 0);
        $post->status = $request->get('status', Post::STATUS_PUBLISHED);

        if ($post->save()) {
                    $user=User::all();
                foreach ($user->chunk(3) as  $users) {
                    foreach ($users as  $row) {
                    $row->notify(new PostNofification($post));
                    }
                }
            return redirect()->route('posts.show',$post->slug)->with('response_message', 'post created successfully')->with('result', 'alert-success');
        } else {
            return redirect()->back()->with('response_message', 'Something went wrong. Please try again')->with('result', 'alert-danger');
        }
    }
    
    public function edit(Edit $request, Post $post)
    {
        $terms = Term::all();
        return view('blog.posts.edit')->with('data', $post)->with('terms', $terms);
    }

    public function update(Update $request, Post $post)
    {
        $this->authorize('update', $post);
        $post->fill($request->all());

        $post->manageTerm($request);
        $post->manageUpload($request);
        $post->comment_status = $request->get('comment_status', 0);
        $post->active = $request->get('active', 0);
        $post->status = $request->get('status', Post::STATUS_PUBLISHED);

        if ($post->save()) {
            return redirect()->back()->with('response_message', 'Your data updated succesfully')->with('result', 'alert-success');
        } else {
            return redirect()->back()->with('response_message', 'Not updated')->with('result', 'alert-danger');

        }
    }


    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        if ($post->comment->delete() && $post->delete()) {
            return redirect()->back()->with('response_message', 'Deleted successfully')->with('result', 'alert-danger');
        } else {
            return redirect()->back()->with('response_message', 'Not Deleted')->with('result', 'alert-danger');
        }


    }
    public function frontShow(Index $request)
    {
        $posts = Post::paginate(10);
        return view('blog.frontend.blog-post')->with('data', $posts);
    }
        public function singlePost(Show $request, $post_slug)
    {
        $data = Post::GetPostBySlug($post_slug)->get();
        return view('blog.frontend.single-post')->with('data', $data);
    }
}
