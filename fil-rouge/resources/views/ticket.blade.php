@extends('template')

@section('contenu')
@if(!empty($IstecHotline))
    <article>
        <section>
            <detail>
                <summary class="border">
                    <h3>{{ $data->nom }}</h3>
                    <p class="txt_inline">Incident n° <span class="ticket_values">{{ {{ $data->id_ticket }} }}</span>
                    </p>
                </summary>
                <div class="border" id="incident_detail">
                    <p class="txt_inline">Statut : <span class="ticket_values">{{ $data->status_label }}</span></p>
                    <p class="txt_inline">
                        <label for="panne_type"></label>
                        Type de panne :
                        <span class="ticket_values">
                            <select id="panne_type">
                                <option value="">à définir</option>
                                <option value="type01">type01</option>
                                <option value="type02">type02</option>
                                <option value="type03">type03</option>
                                <option value="type04">type04</option>
                                <option value="type05">type05</option>
                                <option value="type06">type06</option>
                            </select>
                        </span>
                    </p>
                    <p class="txt_inline">Date d’ouverture : <span class="ticket_values">{{ $data->date_de_creation }}</span></p>
                    <p class="txt_inline">Dernière mise à jour : <span class="ticket_values">{{ $data->date_de_maj }}</span></p>
                    <p class="txt_inline">Sujet : <span class="ticket_values">{{ $data->sujet }}</span>
                    </p>
                </div>
            </detail>
        </section>
        <section>
            <div>
                <div>
                    <h3 class="hidden">Messages</h3>
                </div>
                <div class="chat-container">
                    <ul class="chat">
                        @foreach ($data as $message){
                            <li class="message left">
                                <img class="logo" src="/img/computer-icons-clip-art-man.svg" alt="">
                                <p>{{ $message->msg }},</p>
                            </li>
                        }
                        @endforeach
                    </ul>
                    <textarea class="text_input" name="" id="" cols="30" rows="4" placeholder="Message..."></textarea>
                </div>
            </div>

        </section>
    </article>
    @endif

@endsection
