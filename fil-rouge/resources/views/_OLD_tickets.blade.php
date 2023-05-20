@extends('template')

@section('title')
    TEST
@endsection

@section('contenu')
    <h1>Les Tickets</h1>
    <div>
        @foreach ($data as $RowData)
            {{ $RowData->IdStatus }}
            <br>
            @foreach ($RowData as $Cell)
                <p>{{ $Cell }}</p>
            @endforeach
            <br>
        @endforeach
    </div>
@endsection
