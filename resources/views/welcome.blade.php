@extends('layouts.app')
@section('title'){{$level->title}}@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Level - {{$level->level}}</div>
                <form class="form-horizontal" role="form" method="post" action="{{ url('/answer') }}">
                    {!! csrf_field() !!}
                    <div class="form-group" style="margin-top: 15px;">
                    <center>
                    <img src="{{$level->background}}"  />
                    </center>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <input type="text" class="form-control" name="answer" required placeholder="{{$level->placeholder}}">
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-sign-in"></i> Submit
                            </button>
                        </div>
                    </div>
                </form>
                <div class="panel-body">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('html_comment'){{$level->html_comment}}@endsection