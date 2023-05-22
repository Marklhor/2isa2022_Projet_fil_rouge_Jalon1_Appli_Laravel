@extends('template')

@section('title')
    TEST
@endsection

@section('contenu')
    <h1>Les Tickets</h1>
    <form action="{{ route('ticket.detail') }}" method="post">
        @csrf
        <input type="text" name="Id" id="Id">
        <input type="submit" value="Envoyer">
    </form>
    <button href="{{ route('select.ticket') }}">Reset</button>

    @isset($data)
        <hr>
        {{ $data[0]->Id }} - {{ $data[0]->IdAuteur }}
    @endisset
@endsection
