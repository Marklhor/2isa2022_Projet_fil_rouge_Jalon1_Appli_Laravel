<div class="error txt_inline">
    {{-- // TODO algo impossible voir le TODO perte de l iduser de session dans TicketController --}}
    {{-- @if (!empty(session()->get('error')))
        {{ session()->get('error') }}
    @elseif(!empty(session()->get('errordb')))
        {{ session()->get('errordb') }}
    @endif --}}
    {{ session()->get('error') }}
    {{ session()->get('errordb') }}
</div>
