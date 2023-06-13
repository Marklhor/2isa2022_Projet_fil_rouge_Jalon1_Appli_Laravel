@extends('template')

@section('contenu')
    <h1>Veuillez contacter votre gestionnaire du parc informatique</h1>
    <div class="error">
        {{ session()->get('errordb') }}
    </div>
@endsection
