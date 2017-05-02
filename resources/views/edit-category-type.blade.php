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
                        <div class="register-box-body  col-md-8 col-md-offset-2">
                            <form action="/category-type/update/{{ $data->id }}" method="post">

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control" placeholder="Category type name" name="terms_type_name" value="{{$data->terms_type_name}}"/>
                                    <span class="glyphicon  form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="text"  class="form-control" placeholder="Category type slug" name="terms_type_slug" value="{{$data->terms_type_slug}}"/>
                                    <span class="glyphicon  form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control" placeholder="Category type description" name="terms_type_description" value="{{$data->terms_type_description}}"/>
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
