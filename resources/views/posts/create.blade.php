@extends('layouts.admin.template')


@section('content')
    <div class="row">
        <div class="col-md-12">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><a href="{{route('posts.index')}}"><i class="fa fa-backward"></i></a> Create Post</h3>

                    <div class="box-tools pull-right">

                    </div>
                </div>
                <div class="box-body container">
                    @if(Session()->has('response_message'))
                        <p class="{{Session::get('result')}}">{{Session::get('response_message')}}</p>
                    @endif
                    <div class="register-box-body col-md-8 col-md-offset-2">
                        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group has-feedback">
                                <label for="post_title" class="col-md-4 control-label">Title *</label>
                                <input type="text" class="form-control" id="post_title" placeholder="post title" name="title"
                                       value="{{ old('title') }}"/>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                @endif
                                <span class="glyphicon form-control-feedback"></span>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="slug" class="col-md-4 control-label">Slug *</label>
                                <input type="text" id="slug" class="form-control" placeholder="Post slug" name="slug"
                                       value="{{ old('slug') }}"/>
                                @if ($errors->has('slug'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('slug') }}</strong>
                                        </span>
                                @endif
                                <span class="glyphicon  form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">

                                    @foreach($term as $terms_row)
                                        <input type="checkbox" name="term_id[]"
                                               value="{{$terms_row->id}}"/>{{$terms_row->name}}<br/>
                                    @endforeach
                            </div>
                            <div class="form-group has-feedback">
                                <label for="content" class="col-md-4 control-label">Content *</label>
                                    <textarea rows="4" id="content" cols="50" class="form-control" placeholder="Post content" name="content">{{ old('content') }}</textarea>
                                @if ($errors->has('content'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('content') }}</strong>
                                        </span>
                                @endif
                                <span class="glyphicon  form-control-feedback"></span>
                            </div>


                            <div class="form-group has-feedback">
                                <label for="post_thumb" class="col-md-4 control-label">Thumbnail </label>

                                <input id="post_thumb" type="file" name="post_thumb" accept="jpeg/jpg/png*"
                                       value="">
                            </div>
                            <div class="form-group has-feedback">
                                <input type="checkbox" name="status" id="active_status" value="0"> Hidden post
                                @if ($errors->has('status'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                @endif
                                <span class="glyphicon  form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="checkbox" name="comment_status" id="active_status" value="0"> Comment
                                Off
                                @if ($errors->has('comment_status'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('comment_status') }}</strong>
                                        </span>
                                @endif
                                <span class="glyphicon  form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="checkbox" name="active" id="active_status" value="0"> Save as Draft
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
                    <?php print_r($errors) ?>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
    </div>
@endsection
