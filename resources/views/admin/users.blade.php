@extends('layouts.appo')

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
                <th>#</th>
                <th>UID</th>
                <th>Username</th>
                {{--<th>Rank</th>--}}
                <th>Level</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>College</th>
                <th>Role</th>
                <th>Created At</th>
                </thead>
                <tbody>
                <?php $i=1 ?>
                @foreach($users as $x)
                    <tr>
                        <td>{{$i}}</td>
                        <th>{{$x->id}}</th>
                        <th>{{$x->name}}</th>
                        <th>{{$x->level}}</th>
                        <th>{{$x->mobile}}</th>
                        <th>{{$x->email}}</th>
                        <th>{{$x->college}}</th>
                        <th>{{$x->role}}</th>
                        <th>{{$x->created_at}}</th>

                    </tr>
                   <?php $i = $i + 1 ?>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
