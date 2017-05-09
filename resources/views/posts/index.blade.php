@extends('layouts.admin.template')
@section('content')
    <div class="">
        <div class="row">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Posts</h3>

                    <div class="box-tools pull-right">

                        <a href="{{route('posts.create')}}"> <i class="fa fa-plus"></i></a>

                    </div>
                </div>
                <div class="box-body">
                    @foreach($data->chunk(3) as $posts)
                        <div class="row">
                            @foreach($posts as $post)
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
                                                {{method_field('delete')}}
                                                {{csrf_field()}}
                                                <input class="btn btn-danger btn-sm" type="submit" value="Delete">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
    </div>
@endsection
