@extends('template')

@section('title')
    Service informatique AMIO - Gestion des incidents
@endsection

@section('contenu')
    <article class="table_fix_head">
        <table class="container">
            @if (!empty($IsTecHotline) && $IsTecHotline)
                <caption class="fixed">TOUS LES INCIDENTS</caption>
            @else
                <caption class="fixed">TOUS MES INCIDENTS</caption>
            @endif
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
                @if (!empty($IsTecHotline) && $IsTecHotline)
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
                @if (!empty($data))
                    @foreach ($data as $RowData)
                        <tr>
                            <td><a href="{{ route('ticket', ['nb' => $RowData->id_ticket]) }}">{{ $RowData->id_ticket }}</a>
                            </td>
                            <td>{{ $RowData->sujet }}</td>
                            <td>{{ $RowData->type_de_panne }}</td>
                            @if (!empty($IsTecHotline) && $IsTecHotline)
                                <td>{{ $RowData->nom }}</td>
                            @endif
                            <td>
                                {{ $RowData->avancement }}j&#x20;
                                @switch($RowData->id_status)
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
                            <td>{{ $RowData->date_de_creation }}</td>
                            <td>{{ $RowData->date_de_maj }}</td>
                            <td>{{ $RowData->nb_de_message }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </article>
@endsection
