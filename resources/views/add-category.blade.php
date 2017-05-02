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
                        <h3 class="box-title">Add {{App\Terms_type::GetNameBySlug($category_type_slug)}}</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body container">
                        {{ trans('adminlte_lang::message.logged') }}. Start creating your amazing {{App\Terms_type::GetNameBySlug($category_type_slug)}}!
                        @if(Session()->has('response_message'))                 
                                    <p class="{{Session::get('result')}}">{{Session::get('response_message')}}</p>
                        @endif
                        <div class="register-box-body col-md-8 col-md-offset-2">
                            <form action="/add-category/{{$category_type_slug}}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control add-name" placeholder="Category nam e" name="name" value="{{ old('name') }}"/>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                    <span class="glyphicon form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control" placeholder="Category slug" name="slug" value="{{ old('slug') }}"/>
                                    @if ($errors->has('slug'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('slug') }}</strong>
                                        </span>
                                    @endif
                                    <span class="glyphicon  form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control" placeholder="Category description" name="term_description" value="{{ old('term_description') }}"/>
                                    @if ($errors->has('term_description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('term_description') }}</strong>
                                        </span>
                                    @endif
                                    <span class="glyphicon  form-control-feedback"></span>
                                </div>
                                    <div class="col-xs-4 col-xs-push-1">
                                        <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('adminlte_lang::message.submit') }}</button>
                                    </div><!-- /.col -->
                            </form>

                        </div><!-- /.form-box -->
                        
                        <div class="ctegory-type-table col-md-12">
                            
                <table class="table">
                <h3>{{App\Terms_type::GetNameBySlug($category_type_slug)}}:</h3>
                    <tr>
                        <td>Sl</td>
                        <td>Name</td>
                        <td>Slug</td>
                        <td>Description</td>
                        <td>Catergory Type id</td>
                        <td>Username</td>
                    </tr>
                    <?php $i=1; ?>
                    @foreach($data as $row)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->slug}}</td>
                            <td>{{$row->term_description}}</td>
                            <td>{{$row->terms_type_id}}</td>
                            <td>{{Auth::User($row->user_id)->username}}</td>
                            <td>
                                <a href="/category/edit/{{ $row->id }} " class="btn btn-warning">Edit</a>
                                <form action="/category/delete/{{ $row->id }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) {return true} else {return false};">

                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php $i=$i+1; ?>
                    @endforeach
                </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>
    </div>
@endsection
