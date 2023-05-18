@extends('template')

@section('title')
    Service informatique AMIO - Gestion des incidents
@endsection

@section('contenu')
    <article class="table_fix_head">
        <table class="container">
            <caption class="fixed">TOUS LES INCIDENTS</caption>
            <thead class="fixed">
                <th>
                    <span class="mobil_text">n°</span>
                    <span class="desk_text">Référence</span>
                </th>
                <th>Sujet</th>
                <th>
                    <span class="mobil_text">Panne</span>
                    <span class="desk_text">Type de panne</span>
                </th>
                @if (!empty($IstecHotline) && $IsTecHotline)
                    <th>Auteur</th>
                @endif
                <th>
                    <span class="mobil_text">Avcmt</span>
                    <span class="desk_text">Avancement</span>
                </th>
                <th>Date de création</th>
                <th>Date de mise-à-jour</th>
                <th>
                    <span class="mobil_text">msg</span>
                    <span class="desk_text">nombre de message</span>
                </th>
            </thead>
            <tbody>
                @if (!empty($Tickets))
                    @foreach ($Tickets as $Ticket)
                        <td>{{ $Ticket->id_ticket }}</td>
                        <td>{{ $Ticket->sujet }}</td>
                        <td>{{ $Ticket->type_de_panne }}</td>
                        @if (!empty($IstecHotline) && $IsTecHotline)
                            <td>{{ $Ticket->nom }}</td>
                        @endif
                        <td>
                            {{ $Ticket->avancement }}j&#x20;
                            @switch($Ticket->id_status)
                                @case(11111)
                                    <sub><img class="icon_advance" src="/img/red.svg" alt=""></sub>
                                    @break
                                @case(22222)
                                    <sub><img class="icon_advance" src="/img/yellow.svg" alt=""></sub>
                                    @break
                                @case(33333)
                                    <sub><img class="icon_advance" src="/img/green.svg" alt=""></sub>
                                    @break
                            @endswitch
                        </td>
                        <td>{{ $Ticket->date_de_creation }}</td>
                        <td>{{ $Ticket->date_de_maj }}</td>
                        <td>{{ $Ticket->nb_de_message }}</td>
                    @endforeach
                @endif
            </tbody>
        </table>
    </article>
@endsection
