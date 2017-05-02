@extends('layouts.admin.template')


@section('content')
    <div class="row">
        <div class="col-md-12">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><a href="{{route('posts.index')}}"><i class="fa fa-backward"></i></a> Create Categories</h3>

                    <div class="box-tools pull-right">

                    </div>
                </div>
                <div class="box-body container">
                    @if(Session()->has('response_message'))
                        <p class="{{Session::get('result')}}">{{Session::get('response_message')}}</p>
                    @endif
                    <div class="register-box-body col-md-8 col-md-offset-2">
                        <form action="{{ route('terms.store') }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group has-feedback">
                                <label for="post_title" class="col-md-4 control-label">Name *</label>
                                <input type="text" class="form-control" id="post_title" placeholder="post title" name="name"
                                       value="{{ old('name') }}"/>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                @endif
                                <span class="glyphicon form-control-feedback"></span>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="slug" class="col-md-4 control-label">Slug *</label>
                                <input type="text" id="slug" class="form-control" placeholder="Terms slug" name="slug"
                                       value="{{ old('slug') }}"/>
                                @if ($errors->has('slug'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('slug') }}</strong>
                                        </span>
                                @endif
                                <span class="glyphicon  form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="term_description" class="col-md-4 control-label">Content *</label>
                                    <textarea rows="4" id="term_description" cols="50" class="form-control" placeholder="Term term_description" name="term_description">{{ old('term_description') }}</textarea>
                                @if ($errors->has('term_description'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('term_description') }}</strong>
                                        </span>
                                @endif
                                <span class="glyphicon  form-control-feedback"></span>
                            </div>

                            <div class="form-group has-feedback">

                                    @foreach($term as $terms_row)
                                        <input type="radio" name="parent_id"
                                               value="{{$terms_row->id}}"/>{{$terms_row->name}}<br/>
                                    @endforeach
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
