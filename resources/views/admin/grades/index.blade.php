@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Grades <a href="{{ url('/admin/grades/create') }}" class="btn btn-primary btn-xs" title="Add New Grade"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Name </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($grades as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $item->number }} <!-- $x --></td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ url('/admin/grades/' . $item->id) }}" class="btn btn-success btn-xs" title="View Grade"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/admin/grades/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Grade"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/grades', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Grade" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Grade',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $grades->render() !!} </div>
    </div>

</div>
@endsection
