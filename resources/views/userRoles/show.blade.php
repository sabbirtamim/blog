@extends('blog::layouts.admin.template')
@section('content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Home</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        {{ trans('adminlte_lang::message.logged') }}. Start creating your amazing application!
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <div class="content">
                            @foreach($data as $post)
                                <div class="col-sm-4 col-md-4">
                                    <div class="thumbnail">
                                        <img src="{{$post->getThumbnailUrl()}}" alt="{{$post->title}}">
                                        <div class="caption">
                                            <h3>{{$post->title}}</h3>
                                            <p>
                                                {{$post->content}}
                                            </p>
                                            <div>
                                                <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary btn-sm"
                                                   role="button">Edit</a>
                                                <form onsubmit="return confirm('Are you sure you want to delete this post?')" style="display:inline;float: right;" method="POST" action="{{route('posts.destroy',$post->id)}}">
                                                {{method_field('DELETE')}}
                                                {{csrf_field()}}
                                                <input class="btn btn-danger btn-sm" type="submit" value="Delete">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection
