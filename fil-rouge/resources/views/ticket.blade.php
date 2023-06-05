@extends('template')

@section('title')
    Service informatique AMIO - Incident
@endsection


@section('contenu')
    @if (!empty($data))
        <article>
            <section>
                <detail class="detail_ticket">
                    <summary class="border">

                        <h3>{{ $data[0]->nom }}</h3>
                        <p class="txt_inline">n° <span class="ticket_values">{{ $data[0]->id_ticket }}</span>
                        </p>
                    </summary>
                    <div class="border" id="incident_detail">
                        @include('templates.request_result')
                        <p class="statut_zone">
                            <span>
                                Statut :
                                <span class="ticket_values">
                                    {{ $data[0]->status_label }}
                                    @switch($data[0]->id_status)
                                        @case(11111)
                                            <img class="icon_advance" src="/img/red.svg" alt="">
                                        @break

                                        @case(22222)
                                            <img class="icon_advance" src="/img/yellow.svg" alt="">
                                        @break

                                        @case(33333)
                                            <img class="icon_advance" src="/img/green.svg" alt="">
                                        @break
                                    @endswitch
                                </span>
                            </span>
                            @if ($data[0]->id_status != 33333)
                                <span>
                                    <form class="" action="{{ route('closeticket', ['nb' => $data[0]->id_ticket]) }}"
                                        method="POST">
                                        @csrf
                                        <button class="bt_submit bt_close_ticket" type="submit">Clôturer</button>
                                    </form>
                                </span>
                            @endif
                        </p>
                        @include('templates.request_result')
                        <p class="txt_inline">
                            <label for="panne_type"></label>
                            Type de panne :
                            <span class="ticket_values">
                                {{ $data[0]->label_panne }}
                            </span>
                        </p>
                        <p class="txt_inline">Date d’ouverture : <time class="ticket_values"
                                datetime="{{ $data[0]->date_de_creation }}">{{ $data[0]->date_de_creation }}</time>
                        </p>
                        <p class="txt_inline">Dernière mise à jour : <time class="ticket_values"
                                datetime="{{ $data[0]->date_de_maj }}">{{ $data[0]->date_de_maj }}</time>
                        </p>
                        <p class="txt_inline sujet">Sujet : <span class="ticket_values">{{ $data[0]->sujet }}</span>
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
                            @foreach ($data as $message)
                                <li @switch(session()->get('idUser'))
                                    @case ($message->id_user)
                                        class="message right">
                                        <img class="logo" src="/img/computer-icons-clip-art-man.svg" alt="usager">
                                        @break
                                    @default
                                        class="message left">
                                        <img class="logo" src="/img/help-desk-technical-support.svg" alt="technicien">
                                        @break
                                    @endswitch
                                    <p>
                                    {{ $message->msg }}
                                    </p>
                                    <div class="date">
                                        <p>
                                            @if ($message->id_user != session()->get('idUser'))
                                                <span>{{ $message->nom }} </span>
                                            @endif
                                            <time datetime="{{ $message->date_message }}">{{ $message->date_message }}
                                            </time>
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        @if ($data[0]->id_status != 33333)
                            <form class="chat-form" action="{{ route('postmessage', ['nb' => $data[0]->id_ticket]) }}"
                                method="POST">
                                @csrf
                                <textarea class="text_input" name="message" id="" cols="30" rows="4" type="text"
                                    placeholder="Message..."></textarea>
                                <button class="input bt_submit" type="submit">Envoyer</button>
                                @include('templates.request_result')
                            </form>
                            @error('message')
                                <dir class="error">
                                    {{-- {{ $messsage }} --}} // TODO ERROR
                                </dir>
                            @enderror
                        @endif
                    </div>
                </div>

            </section>
        </article>
    @endif

@endsection
