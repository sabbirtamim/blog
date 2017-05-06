@extends('blog::layouts.admin.template')


@section('content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit User Role</h3>

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

<?php print_r($data->id) ?>
                        <div class="register-box-body col-md-8 col-md-offset-2">
                            <form action="{{ route('terms.update',$data->id) }}" method="post" >
                                                {{method_field('PUT')}}
                                                {{csrf_field()}}
                                                        

                            


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
