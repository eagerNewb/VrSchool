@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Create New Lesson</h1>
    <hr/>

    {!! Form::open(['url' => '/admin/lessons', 'class' => 'form-horizontal']) !!}

            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', 'Name', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


            <div class="form-group">
                {!! Form::label('name', 'Book: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <select class="books form-control" id="book" name="book">
                        @foreach($books as $book)
                        <option value="{{ $book->name }}">{{ $book->name }}</option>
                        @endforeach()
                    </select>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('name', 'Book Grades: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <select class="books form-control" id="book_grade" name="grade">
                        @foreach($books as $book)

                          @foreach($book->grades() as $grade)
                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>

                          @endforeach
                        @endforeach
                    </select>
                </div>
            </div>
 @foreach($books as $book)
<p>{{ $book->name }}</p>
<?php dd($book->grades()) ?>
                        <p>{{ $book->id }}</p>

                        @endforeach

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