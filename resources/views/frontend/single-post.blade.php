<?php 

 ?>
@extends('layouts.front-app')


@section('content')
 

<section class="blog-post">
  @foreach($data as $post)  
                        <?php $post_id=$post->id; ?>
    <div class="container">
      <div class="row">
          <div class="col-md-12">
              
          <div class="row">
          <h3 class="text-center">{{$post->title}}</h3>
          
                <div class="col-md-6 col-md-offset-3">
                    <img class="thumb_single" src="{{$post->getThumbnailUrl()}}" alt="{{ $post->title }}">
                </div>
                <div class="col-md-12">{{strip_tags($post->content)}}  
                    <?php echo strip_tags($post->content); ?>  
                    <?php echo $post->content; ?>              
                </div>                
                </div>
          </div>
          </div>

        @if($post->comment_status=="0")
          <div class="col-md-12">
            <div class="container">
              <div class="row">
                <div class="col-md-8">
                  <h2 class="page-header">Comments</h2>
                  @if(Session()->has('response_message'))                 
                                                <p class="{{Session::get('result')}}">{{Session::get('response_message')}}</p>
                                    @endif
                    <section class="comment-list">
                      <!-- First Comment -->
                      <article class="row">
                        <div class="col-md-2 col-sm-2 hidden-xs">
                          <figure class="thumbnail">
                            <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />
                            <?php// $user = Auth::user(); ?>
                            <figcaption class="text-center">{{Auth::user()->username}}</figcaption>
                          </figure>
                        </div>
                          <div class="col-md-10 col-sm-10 ">
                           <form action="{{ route('posts.comments.store',$post_id) }}" method="post">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <textarea name="comment_content" id="comment" cols="30" rows="5" style="width: 100% ; "></textarea>
                                    @if ($errors->has('comment_content'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('comment_content') }}</strong>
                                        </span>
                                    @endif

                              <div class="comment-submit ">
                                  <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('adminlte_lang::message.submit') }}</button>
                              </div><!-- /.col -->

                            </form>
                          </div>
                        </article>
                      <!-- First Comment -->

                        <?php $comment=App\Comment::GetCommentById($post_id)->get(); 
                        $i=1;?>

                      @foreach($comment as $comment_row)
                      @if(empty($comment_row->parent_id ))
                        <article class="row">
                          <div class="col-md-2 col-sm-2 hidden-xs">
                            <figure class="thumbnail">
                              <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />
                              <?php $username=App\User::GetUsernameByUserId($comment_row->user_id)  ?>
                              <figcaption class="text-center">{{$username}}</figcaption>
                            </figure>
                          </div>
                          <div class="col-md-10 col-sm-10">
                            <div class="panel panel-default arrow left">
                              <div class="panel-body comment-body">
                                <header class="text-left">
                                  <div class="comment-user"><i class="fa fa-user"></i> Comment {{$i++}}</div>
                                  <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> {{$comment_row->updated_at}}</time>
                                </header>
                                <div class="comment-post">
                                <button type="button" class=" edit-button btn btn-primary btn-block btn-flat">Edit</button>
                                <p class="row"><i class="fa fa-reply"></i> 

                                    <button type="button" class=" reply-button btn btn-primary btn-block btn-flat">Reply</button></p>
                                  <p>
                                    {{$comment_row->comment_content}}
                                  </p>
                                </div>
                                
                                  <div class="replyied-comment-edit">
                                   <form action="{{ route('posts.comments.update' , [$post_id,$comment_row->id]) }}" method="post">
                                      
                                                {{method_field('PUT')}}
                                                {{csrf_field()}}
                                      <textarea name="comment_content" id="comment" cols="30" rows="5" style="width: 100% ; ">
                                          {{$comment_row->comment_content}}</textarea>
                                            @if ($errors->has('comment_content'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('comment_content') }}</strong>
                                                </span>
                                            @endif

                                      <div class="comment-submit "> 
                                          <button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
                                      </div><!-- /.col -->

                                    </form>
                                    </div>
                                <!-- Replyied Comment -->
                    <?php $replyied_comment=App\Comment::GetCommentByParentId($comment_row->id)->get() ?>
                              @foreach($replyied_comment as $replyied_comment_row)
                              <article class="row replyed-comment">
                                <div class="col-md-2 col-sm-2 hidden-xs">
                                  <figure class="thumbnail">
                                    <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />
                                    <?php// $user = Auth::user(); ?>
                                    <figcaption class="text-center">{{App\User::GetUsernameByUserId($replyied_comment_row->user_id)}}</figcaption>
                                  </figure>
                                </div>
                                <?php $username=App\User::GetUsernameByUserId($replyied_comment_row->user_id); ?>
                                  <div class="col-md-10 col-sm-10 ">

                                <button type="button" class=" edit-button btn btn-primary btn-block btn-flat">Edit</button>
                                  <div class="replyied-comment-post">
                                        <p>
                                          {{$replyied_comment_row->comment_content}}
                                        </p>
                                    </div>

                                  <div class="replyied-comment-edit">
                                   <form action="{{ route('posts.comments.update',[$post_id,$replyied_comment_row->id] ) }}" method="post">
                                      
                                                {{method_field('PUT')}}
                                                {{csrf_field()}}
                                      <textarea name="comment_content" id="comment" cols="30" rows="5" style="width: 100% ; ">
                                          {{$replyied_comment_row->comment_content}}</textarea>
                                            @if ($errors->has('comment_content'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('comment_content') }}</strong>
                                                </span>
                                            @endif

                                      <div class="comment-submit "> 
                                          <button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
                                      </div><!-- /.col -->

                                    </form>
                                    </div>
                                      <p class="col-md-12"><i class="fa fa-reply"></i> 

                                          <button type="button" class=" reply-button btn btn-primary btn-block btn-flat">Reply</button>
                                      </p>
                                  </div>
                                </article>
                                @endforeach
                              <article class="row comment-reply-form-hide">
                                <div class="col-md-2 col-sm-2 hidden-xs">
                                  <figure class="thumbnail">
                                    <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />
                                    <?php// $user = Auth::user(); ?>
                                    <figcaption class="text-center">{{Auth::user()->username}}</figcaption>
                                  </figure>
                                </div>
                                <?php $post_id=$post->id; ?>
                                  <div class="col-md-10 col-sm-10 ">
                                  <h3>Reply form</h3>
                                   <form action="{{ route('posts.comments.store',$post_id) }}" method="post">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      <input type="hidden" name="parent_id" value="{{ $comment_row->id }}">
                                      <textarea name="comment_content" id="comment" cols="30" rows="5" style="width: 100% ; "></textarea>
                                            @if ($errors->has('comment_content'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('comment_content') }}</strong>
                                                </span>
                                            @endif

                                      <div class="comment-submit "> 
                                          <button type="submit" class="btn btn-primary btn-block btn-flat">Reply</button>
                                      </div><!-- /.col -->

                                    </form>
                                  </div>
                                </article>
                              </div>
                            </div>
                          </div>
                        </article>
                      @endif
                      @endforeach
                      </div>
                    </section>
                </div>
              </div>
            </div>
        @endif
        </div>
    </div>
</div>
@endforeach
</section>


@endsection
