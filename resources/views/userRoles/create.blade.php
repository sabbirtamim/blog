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
                        <form action="{{ route('userroles.store') }}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group has-feedback">
                                <label for="userrole_description" class="col-md-4 control-label">Chose User *</label>


                                    @foreach($user as $user_row)
                                        <input type="radio" name="user_id"
                                               value="{{$user_row->id}}"/>{{$user_row->username}}<br/>
                                    @endforeach
                            </div>

                            <div class="form-group has-feedback">
                                <label for="userrole_description" class="col-md-4 control-label">Chose Role *</label>


                                    @foreach($role as $role_row)
                                        <input type="radio" name="role_id"
                                               value="{{$role_row->id}}"/>{{$role_row->name}}<br/>
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
