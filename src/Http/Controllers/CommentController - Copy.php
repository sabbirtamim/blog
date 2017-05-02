<?php



class CommeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('comment');
    }
    public function addNewcomment(){

        return view('add-new-comment');
    }
    
    public function addComment(CreateCommentRequest $request,$post_id){
        $user = Auth::user();
        $comment = new Comment;
        $comment->comment_content = $request->comment_content;
        $comment->post_id = $post_id;
        if (!empty($request->parent_id)) {            
            $comment->parent_id = $request->parent_id;
        }
        $comment->user_id = $user->id;

        
        $response=$comment->save();
        if ($response) {
            return redirect()->back()->with('response_message', 'Commented succesfully')->with('result', 'alert-success');
        }else{
            return redirect()->back()->with('response_message', 'Something went wrong. Please try again')->with('result', 'alert-danger');
        }

    }
        public function replyComment(CreateCommentRequest $request,$post_id,$parent_id){
        $user = Auth::user();
        $comment = new Comment;
        $comment->comment_content = $request->comment_content;
        $comment->post_id = $post_id;           
        $comment->parent_id = $parent_id;
        $comment->user_id = $user->id;

        
        $response=$comment->save();
        if ($response) {
            return redirect()->back()->with('response_message', 'Commente Replied succesfully')->with('result', 'alert-success');
        }else{
            return redirect()->back()->with('response_message', 'Something went wrong. Please try again')->with('result', 'alert-danger');
        }

    }
    public function updateComment(CreateCommentRequest $request,$post_id,$comment_id){
        // $user = Auth::user();
        // if ($user->user_role_id=='1') {

        $comments = Comment::find($comment_id);        
        $comments->comment_content = $request->comment_content;
        $comments->post_id = $post_id;  
        
        $response=$comments->save();
        print_r($response);
        if ($response) {
            return redirect()->back()->with('response_message', 'Your data updated succesfully')->with('result', 'alert-success');
        }else{
            return redirect()->back()->with('response_message', 'Not updated')->with('result', 'alert-danger');

        }
        // }else{
        //     return redirect()->back()->with('response_message', 'Your are not authorised to update it')->with('result', 'alert-danger');
        // }


    }
    public function destroyComment($id){
        // $user = Auth::user();
        // if ($user->user_role_id=='1') {
        $comment = Comment::find($id);
        $comment_childcomment = Comment::find($id)->childcomment();

        $comment_childcomment_response=$comment_childcomment->delete();
        $response=$comment->delete();
        if ($response) {
            return redirect()->back()->with('response_message', 'Deleted succesfully')->with('result', 'alert-danger');
        }
        // }else{
        //     return redirect()->back()->with('response_message', 'Not Deleted')->with('result', 'alert-danger');
        // }


    }
}
