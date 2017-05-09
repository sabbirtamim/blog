@extends('layouts.admin.template')


@section('content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit post</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body container">
                        {{ trans('adminlte_lang::message.logged') }}. Start creating your amazing Category Type!
                        @if(Session()->has('response_message'))                 
                                    <p class="{{Session::get('result')}}">{{Session::get('response_message')}}</p>
                        @endif

                        <?php //print($data); 
                        echo $data->id;?>
                        <div class="register-box-body col-md-8 col-md-offset-2">
                            <form action="{{ route('posts.update',$data->id) }}" method="post" enctype="multipart/form-data">
                                                {{method_field('PUT')}}
                                                {{csrf_field()}}
                            <div class="form-group has-feedback">
                                <label for="post_title" class="col-md-4 control-label">Title *</label>
                                <input type="text" class="form-control" id="post_title" placeholder="post title" name="title"
                                       value="{{ $data->title }}"/>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                @endif
                                <span class="glyphicon form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                            <?php $user = Auth::user();
                            echo $user->id; ?>
                                <label for="datepicker" class="col-md-3 control-label">Publish Date *: </label>
                                <label for="datepicker" class="col-md-4 control-label">{{ $data->publish_at }}</label>
                                </br>
                                <label for="datepicker" class="col-md-12 control-label">Change Publish Date * </label>
                                <input type="date" class="form-control" id="datepicker" placeholder="" name="publish_at"
                                       value=""/>

                                @if ($errors->has('publish_at'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('publish_at') }}</strong>
                                        </span>
                                @endif
                                <span class="glyphicon form-control-feedback"></span>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="slug" class="col-md-4 control-label">Slug *</label>
                                <input type="text" id="slug" class="form-control" placeholder="Post slug" name="slug"
                                       value="{{ $data->slug }}"/>
                                @if ($errors->has('slug'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('slug') }}</strong>
                                        </span>
                                @endif
                                <span class="glyphicon  form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                    @foreach($terms as $terms_row)
                                    <?php $category=$data->term_id; 
                                    $category=(explode(",",$category))?>

                                            @if(!in_array($terms_row->id, $category) )
                                                <input type="checkbox" name="term_id[]" id="term_id" value="{{$terms_row->id}}" > {{$terms_row->name}}<br /> 
                                            @else
                                                <input type="checkbox" name="term_id[]" id="term_id" value="{{$terms_row->id}}" checked> {{$terms_row->name}}<br />
                                            @endif
                                    @endforeach

                            </div>
                            <div class="form-group has-feedback">
                                <label for="content" class="col-md-4 control-label">Content *</label>
                                    <textarea rows="4" id="content" cols="50" class="form-control" placeholder="Post content" name="content">{{ $data->content }}</textarea>
                                @if ($errors->has('content'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('content') }}</strong>
                                        </span>
                                @endif
                                <span class="glyphicon  form-control-feedback"></span>
                            </div>


                            <div class="form-group has-feedback">
                                <label for="post_thumb" class="col-md-4 control-label">Thumbnail *</label>

                                <input id="post_thumb" type="file" name="post_thumb" accept="jpeg/jpg/png*"
                                       value="">
                            </div>                                <div class="form-group has-feedback">
                                    @if($data->comment_status=="0") 
                                <input type="checkbox" name="comment_status" id="active_status" value="0" >  Comment Off  
                                    @elseif($data->comment_status=="1") 
                                <input type="checkbox" name="comment_status" id="active_status" value="1" checked>  Comment Off 
                                    @endif

                                    @if ($errors->has('comment_status'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('comment_status') }}</strong>
                                        </span>
                                    @endif
                                    <span class="glyphicon  form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    @if($data->active=="0") 
                                <input type="checkbox" name="active" id="active_status" value="0" >  Save as Draft  
                                    @elseif($data->active=="1") 
                                <input type="checkbox" name="active" id="active_status" value="1" checked>  Saved as Draft 
                                    @endif

                                    @if ($errors->has('active'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('active') }}</strong>
                                        </span>
                                    @endif
                                    <span class="glyphicon  form-control-feedback"></span>
                                </div>
                            <div class="col-xs-4 col-xs-push-1">
                                <button type="submit"
                                        class="btn btn-primary btn-block btn-flat">{{ trans('adminlte_lang::message.submit') }}</button>
                            </div><!-- /.col -->
                        </form>

                        </div><!-- /.form-box -->
                        
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>
    </div>
@endsection
