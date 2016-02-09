@extends('layouts.app')
@section('title', "LeaderBoard")
@section('content')
    <div class="row-fluid">
        <div class="container">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                <th>#</th>
                <th>UID</th>
                <th>Username</th>
                <th>Level</th>
                <th>Email</th>
                <th>College</th>
                <th>Last Update</th>
                </thead>
                <tbody>
                <?php $i=1 ?>
                @foreach($users as $x)
                    <tr>
                        <td>{{$i}}</td>
                        <th>{{$x->id}}</th>
                        <th>{{$x->name}}</th>
                        <th>{{$x->level}}</th>
                        <th>{{$x->email}}</th>
                        <th>{{$x->college}}</th>
                        <th>{{$x->updated_at}}</th>
                    </tr>
                    <?php $i = $i + 1 ?>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
