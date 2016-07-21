@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Grade {{ $grade->id }}
        <a href="{{ url('admin/grades/' . $grade->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Grade"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/grades', $grade->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Grade',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $grade->id }}</td>
                </tr>
                <tr><th> Name </th><td> {{ $grade->name }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
