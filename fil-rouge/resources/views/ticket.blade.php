@extends('template')

@section('contenu')
    @if (!empty($data))
        <article>
            <section>
                <detail>
                    <summary class="border">

                        <h3>{{ $data[0]->nom }}</h3>
                        <p class="txt_inline">Incident n° <span class="ticket_values">{{ $data[0]->id_ticket }}</span>
                        </p>
                    </summary>
                    <div class="border" id="incident_detail">
                        <p class="txt_inline">Statut : <span class="ticket_values">{{ $data[0]->status_label }}</span></p>
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
                        <p class="txt_inline">Date d’ouverture : <span
                                class="ticket_values">{{ $data[0]->date_de_creation }}</span></p>
                        <p class="txt_inline">Dernière mise à jour : <span
                                class="ticket_values">{{ $data[0]->date_de_maj }}</span></p>
                        <p class="txt_inline">Sujet : <span class="ticket_values">{{ $data[0]->sujet }}</span>
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
                                {{-- {{ var_bump($message) }} --}}

                                <li @switch($message->id_role)
                                    @case(77002)
                                        class="message right">
                                        <img class="logo" src="/img/help-desk-technical-support.svg" alt="technicien">
                                        @break

                                    @case(77001)

                                        class="message left">
                                        <img class="logo" src="/img/computer-icons-clip-art-man.svg" alt="usager">
                                        @break
                                    @endswitch
                                    <p>
                                    {{ $message->msg }}
                                    <p><span>{{ $message->nom }}</span> <span>{{ $message->date_message }}</span>
                                        <span>{{ $message->id_role }}</span> </span>{{ $message->id_user }}<span>
                                    </p>
                                    </p>
                                </li>
                            @endforeach
                        </ul>
                        <form class="chat-form" action="{{ route('postmessage', ['nb' => $data[0]->id_ticket]) }}" method="POST">
                            @csrf
                            {{-- <input type="text" name="id_user" value="{{auth()->user}}" hidden> // TODO --}}
                            <textarea class="text_input" name="message" id="" cols="30" rows="4" placeholder="Message..."></textarea>
                            <button class="input bt_submit" type="submit">Envoyer</button>
                        </form>
                        @error('message')
                        <dir class="error">
                            {{-- TODO message --}}
                            {{$messsage}}
                        </dir>
                        @enderror
                    </div>
                </div>

            </section>
        </article>
    @endif

@endsection
