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
                        <h3 class="box-title">All post</h3>

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
                        
                        <div class="ctegory-type-table col-md-12">
                            
                <table class="table">
                    <tr>
                        <td>Sl</td>
                        <td>post_title</td>
                        <td>post_content</td>
                        <td>term_id</td>
                        <td>Username</td>
                        <td>Post Aciviti</td>
                    </tr>
                    <?php $i=1; ?>
                    @foreach($data as $row)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$row->post_title}}</td>
                            <td>{{$row->post_content}}</td>
                            <td>{{$row->term_id}}</td>
                            <td>{{Auth::User($row->user_id)->username}}</td>
                            <td>{{(($row->active=="0")?"Active":"Draft")}}</td>
                            <td>
                                <a href="/post/edit/{{ $row->id }} " class="btn btn-warning">Edit</a>
                                <form action="/post/delete/{{ $row->id }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) {return true} else {return false};">

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
