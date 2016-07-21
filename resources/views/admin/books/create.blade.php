@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Create New Book</h1>
    <hr/>

    {!! Form::open(['url' => '/admin/books', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', 'Name', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
<div class="form-group {{ $errors->has('grades') ? 'has-error' : ''}}">
        {!! Form::label('grade', 'Grade: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            <select class="grades form-control" id="grades" name="grades[]" multiple="multiple">
                @foreach($grades as $grade)
                <option value="{{ $grade->name }}">{{ $grade->name }}</option>
                @endforeach()
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

</div>
@endsection