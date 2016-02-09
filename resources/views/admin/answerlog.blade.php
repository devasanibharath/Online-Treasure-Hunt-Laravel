@extends('layouts.appo')

@section('content')
    <div class="row-fluid">
        <div class="container">
            <form action="{{ url('/admin/answerlog') }}" method="post" role="form" class="form-horizontal">
                {!! csrf_field() !!}
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <input type="text" class="form-control" name="id" required placeholder="User ID">
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

            <table class="table table-striped table-hover table-bordered">
                <thead>
                <th>Level</th>
                <th>Answer</th>
                <th>Typed at</th>
                <th>IP</th>
                </thead>
                <tbody>

                @if($log<1)

                @else
                @foreach($log as $x)
                    <tr>
                        <td>{{$x->level}}</td>
                        <td>{{$x->answer}}</td>
                        <td>{{$x->created_at}}</td>
                        <td>{{$x->ip}}</td>
                    </tr>
                @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
