@extends('layouts.appo')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        {!! Form::open(['url' => 'admin/level/new', 'autocomplete' => 'on','files'=>true]) !!}
                        <fieldset>
                            <input type="text" name="level" placeholder="Level" class="form-control">
                            <br>
                            <input type="text" name="title" placeholder="Enter Title" class="form-control">
                            <br>
                            <select name="difficulty" class="form-control">
                                <option>Difficulty</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                            <br>
                            <input type="file" name="background" id="file" class="form-control" placeholder="Upload Image">
                            <br>
                            <input name="answer" placeholder="Answer" class="form-control">
                            <br>
						    <input name="placeholder" class="form-control" placeholder="Placeholder Content">
                            <br>
                            <input name="html_comment" class="form-control" placeholder="HTML Comment Content">
                            <br>
                            <label for="success_image">Success Image</label>
                            <input type="file" name="success_image" class="form-control" placeholder="Success_image">
                            <br>
                            <select name="status" class="form-control">
                                <option value="1">Inactive</option>
                                <option value="2">Active</option>
                            </select>
                            <br>
                            <input type="submit" value="create" class="btn btn-block btn-success">
                        </fieldset>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
