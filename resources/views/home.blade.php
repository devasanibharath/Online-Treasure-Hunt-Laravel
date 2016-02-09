@extends('layouts.app')

@section('content')
    <div class="row-fluid">
        <div class="container" id="admin">
            @if(\Session::has('alert'))
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{Session::get('alert')}}</strong>
                </div>
            @endif
            <table class="table table-striped table-hover table-bordered">
                <thead>
                <th>Level</th>
                <th>Title</th>
                <th>Created At</th>
                <th class="foo">Actions</th>
                </thead>
                <tbody>
                @foreach($levels as $x)
                    <tr>
                        <td>{{$x->level}}</td>
                        <td>{{$x->title}}</td>
                        <td>{{$x->created_at}}</td>
                        <td>
                            <div class="btn-group-justified">
                                <a href="admin/level/{{$x->level}}/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                <a href="admin/level/{{$x->level}}/delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection


