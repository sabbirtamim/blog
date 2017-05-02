@extends('layouts.admin.template')
@section('content')
    <div class="">
        <div class="row">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Roles</h3>

                    <div class="box-tools pull-right">

                        <a href="{{route('roles.create')}}"> <i class="fa fa-plus"></i></a>

                    </div>
                </div>
                <div class="box-body">
                    @foreach($data->chunk(3) as $roles)
                        <div class="row">
                            @foreach($roles as $role)
                                <div class="col-sm-12 col-md-12">
                                    <table>
                                        <tr>
                                            <td><h3>{{$role->name}}</h3></td>
                                            <td>
                                                <p>{{$role->description}}</p>
                                            </td>
                                            <td>
                                                <a href="{{route('roles.edit',$role->id)}}" class="btn btn-primary btn-sm"
                                                   role="button">Edit</a>
                                            </td>
                                            <td>
                                                <form onsubmit="return confirm('Are you sure you want to delete this role?')" style="display:inline;float: right;" method="POST" action="{{route('roles.destroy',$role->id)}}">
                                                {{method_field('delete')}}
                                                {{csrf_field()}}
                                                <input class="btn btn-danger btn-sm" type="submit" value="Delete">
                                                </form>
                                            </td>
                                        </tr>
                                    </table>
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
