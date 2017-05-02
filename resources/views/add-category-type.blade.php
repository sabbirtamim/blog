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
                        <div class="register-box-body col-md-8 col-md-offset-2">
                            <form action="{{ url('/add-category-type/add') }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control" placeholder="Category type name" name="terms_type_name" value="{{ old('terms_type_name') }}"/>
                                    <span class="glyphicon form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control" placeholder="Category type slug" name="terms_type_slug" value="{{ old('terms_type_slug') }}"/>
                                    <span class="glyphicon  form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control" placeholder="Category type description" name="terms_type_description" value="{{ old('terms_type_description') }}"/>
                                    <span class="glyphicon  form-control-feedback"></span>
                                </div>
                                    <div class="col-xs-4 col-xs-push-1">
                                        <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('adminlte_lang::message.submit') }}</button>
                                    </div><!-- /.col -->
                            </form>

                        </div><!-- /.form-box -->
                        <div class="ctegory-type-table col-md-12">
                            
                <table class="table">
                <h3>Category type:</h3>
                    <tr>
                        <td>Sl</td>
                        <td>Name</td>
                        <td>Slug</td>
                        <td>Description</td>
                        <td>Username</td>
                        <td>Created Date</td>
                    </tr>
                    <?php $i=1; ?>
                    @foreach($data as $row)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$row->terms_type_name}}</td>
                            <td>{{$row->terms_type_slug}}</td>
                            <td>{{$row->terms_type_description}}</td>
                            <td>{{Auth::User($row->user_id)->username}}</td>
                            <td>{{$row->updated_at}}</td>
                            <td>
                                <a href="/category-type/edit/{{ $row->id }} " class="btn btn-warning">Edit</a>
                                <form action="/category-type/delete/{{ $row->id }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) {return true} else {return false};">

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
