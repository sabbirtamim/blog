@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Category Type</h3>

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

                        <?php// print($data) ?>
                        <div class="register-box-body col-md-8 col-md-offset-2">
                            <form action="/post/update/{{ $data->id }}" method="post"  enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group has-feedback">
                                <label for="post_thumb" class="col-md-4 control-label">Edit title *</label>
                                    <input type="text" class="form-control" placeholder="post title" name="post_title" value="{{ $data->post_title }}"  />
                                    @if ($errors->has('post_title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('post_title') }}</strong>
                                        </span>
                                    @endif
                                    <span class="glyphicon form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                <label for="post_thumb" class="col-md-4 control-label">Edit slug *</label>
                                    <input type="text" class="form-control" placeholder="Post slug" name="post_slug" value="{{ $data->post_slug }}"/>
                                    @if ($errors->has('post_slug'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('post_slug') }}</strong>
                                        </span>
                                    @endif
                                    <span class="glyphicon  form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                @foreach($terms_type as $terms_type_row)
                                <label for="">{{$terms_type_row->terms_type_name}}</label>
                                <?php $terms=App\Term::GetTermByTermsTypeId($terms_type_row->id)->get(); 
                                // print_r($terms) ;
                                ?>

                                    @foreach($terms as $terms_row)
                                    <?php $category=$data->term_id; 
                                    $category=(explode(",",$category))?>

                                            @if(!in_array($terms_row->id, $category) )
                                                <input type="checkbox" name="term_id[]" id="term_id" value="{{$terms_row->id}}" > {{$terms_row->id}}<br /> 
                                            @else
                                                <input type="checkbox" name="term_id[]" id="term_id" value="{{$terms_row->id}}" checked> {{$terms_row->id}}<br />
                                            @endif
                                    @endforeach
                                    @endforeach
                                </div>
                                <div class="form-group has-feedback">
                                <label for="post_thumb" class="col-md-4 control-label">Edit content *</label>
                                    <textarea rows="4" cols="50" class="form-control" placeholder="Post content" name="post_content">
                                    {{ $data->post_content }} 
                                    </textarea>
                                    @if ($errors->has('post_content'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('post_content') }}</strong>
                                        </span>
                                    @endif
                                    <span class="glyphicon  form-control-feedback"></span>
                                </div>

                                <div class="form-group has-feedback">
                                <img class="post_thumb_url" src="{{ $data->post_thumb_url }}" alt="{{ $data->post_title }}">
                                <label for="post_thumb" class="col-md-4 control-label">Edit thumbnail *</label>

                                <input id="post_thumb" type="file" name="post_thumb" accept="jpeg/jpg/png*" value="{{ $data->post_thumb_url }}" >
                                </div>
                                <div class="form-group has-feedback">
                                    @if($data->post_status=="0") 
                                <input type="checkbox" name="post_status" id="active_status" value="0" >  Hidden post 
                                    @elseif($data->post_status=="1") 
                                <input type="checkbox" name="post_status" id="active_status" value="1" checked>  Hidden post 
                                    @endif

                                    @if ($errors->has('post_status'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('post_status') }}</strong>
                                        </span>
                                    @endif
                                    <span class="glyphicon  form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
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
                                        <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('adminlte_lang::message.submit') }}</button>
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
