@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <label for="name">Nom</label>

            <input type="text" name="name" value="{{ old('name') }}"
                class="input bt_value @error('name') is-invalid @enderror" required autofocus />
            @error('name')
                <div class="error">Erreur sur le nom</div>
            @enderror
        </div>
        <div>
            <label for="firstname">Prénom</label>
            <input type="text" name="firstname" value="{{ old('firstname') }}"
                class="input bt_value @error('firstname') is-invalid @enderror" required autofocus />
            @error('firstname')
                <div class="error">Erreur sur le prénom</div>
            @enderror
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ old('email') }}"
                class="input bt_value @error('email') is-invalid @enderror" required />
            @error('email')
                <div class="error">Erreur sur l'email</div>
            @enderror
        </div>

        <div>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" required />
        </div>

        <div>
            <label for="password_confirmation">Confirmer le mot de passe</label>
            <input type="password" name="password_confirmation" required />
        </div>

        <a href="{{ route('login') }}">Déjà enregistré ?</a>

        <div>
            <button type="submit">Enregistrer</button>
        </div>
        {{-- @if ($errors->any()) // TODO error any, voir si utilse
        <div>
            <div>
                <p>Quelque chose s'est mal passé</p>
            </div>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    </form>
@endsection
