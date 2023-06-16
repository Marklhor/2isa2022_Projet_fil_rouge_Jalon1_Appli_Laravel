@extends('template')

@section('title')
    Service informatique AMIO - Nouvel incident
@endsection

@section('contenu')
    <article>
        <form action="{{ route('postnewticket') }}" method="POST">
            @csrf
            <fieldset class="fieldset_newticket">
                <legend>Nouvel incident</legend>
                <label for="sujet" class="">Entrer le sujet :</label>
                <input class="input bt_value input_with_text @error('sujet') is-invalid @enderror" type="text"
                    id="new_sujet" name="sujet" value="" placeholder="Entrer votre le sujet de votre incident"
                    required>
                @error('sujet')
                    <div class="error">Veuillez entrer un texte de cinq carractères minimun </div>
                @enderror
                <label for="panne_type">Choisir le type de panne :</label>
                <select class="input bt_value ticket_values input_with_text" id="panne_type" name="panne_type">
                    <option value="">à définir</option>
                    @foreach ($liste_pannes as $panne)
                        <option value="{{ $panne->Id }}">{{ $panne->Label }}</option>
                    @endforeach
                </select>

                <label for="message" class="">Décrivez l'incident :</label>
                <textarea class="input  bt_value input_with_text @error('message') is-invalid @enderror" type="text" id="new_message"
                    name="message" placeholder="décrivez ..." required></textarea>
                @error('message')
                    <div class="error">Veuillez entrer un texte de deux carractères minimun</div>
                @enderror
                <button class="input bt_submit" type="submit">Envoyer</button>

                @include('templates.request_result')
                <a class="input bt_nok" href="{{ route('choisehome') }}">Annuler</a>
            </fieldset>
        </form>
    </article>
@endsection
