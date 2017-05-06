@extends('blog::layouts.admin.template')


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

<?php print_r($data) ?>
                        <div class="register-box-body col-md-8 col-md-offset-2">
                            <form action="{{ route('terms.update',$data->id) }}" method="post" >
                                                {{method_field('PUT')}}
                                                {{csrf_field()}}
                            <div class="form-group has-feedback">
                                <label for="post_title" class="col-md-4 control-label">Name *</label>
                                <input type="text" class="form-control" id="post_title" placeholder="post title" name="name"
                                       value="{{ $data->name }}"/>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
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
                                <label for="term_description" class="col-md-4 control-label">Term Description *</label>
                                    <textarea rows="4" id="term_description" cols="50" class="form-control" placeholder="term_description" name="term_description">{{ $data->term_description }}</textarea>
                                @if ($errors->has('term_description'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('term_description') }}</strong>
                                        </span>
                                @endif
                                <span class="glyphicon  form-control-feedback"></span>
                            </div>

                            <div class="form-group has-feedback">
                                    @foreach($terms as $terms_row)
                                    <?php $category=$data->parent_id; 
                                    $category=(explode(",",$category))?>

                                            @if(!in_array($terms_row->id, $category) )
                                                @if($data->id==$terms_row->id)

                                                @else
                                                <input type="radio" name="parent_id"
                                                   value="{{$terms_row->id}}"/>{{$terms_row->name}}<br/>
                                                @endif
                                            @else
                                                
                                        <input type="radio" name="parent_id"
                                               value="{{$terms_row->id}}" checked="checked"/>{{$terms_row->name}}<br/>
                                            @endif
                                    @endforeach

                                    
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
