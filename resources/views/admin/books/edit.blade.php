@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit Book {{ $book->id }}</h1>

    {!! Form::model($book, [
        'method' => 'PATCH',
        'url' => ['/admin/books', $book->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', 'Name', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
<div class="form-group {{ $errors->has('grades') ? 'has-error' : ''}}">
        {!! Form::label('grade', 'Grades: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            <select class="grades" id="grades" name="grades[]" multiple="multiple">
                @foreach($grades as $grade)
                {{-- */ if(in_array($grade->name, $book_grades)) { $selected = 'selected="selected"'; } else { $selected = ''; }/* --}}
                <option value="{{ $grade->name }}" {{ $selected }}>{{ $grade->name }}</option>
                @endforeach()
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
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