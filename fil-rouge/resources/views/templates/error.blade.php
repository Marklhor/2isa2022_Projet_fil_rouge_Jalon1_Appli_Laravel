<div class="error">
    {{-- @if (!isset(session()->get('error')))
        {{ session()->get('error') }}
    @else
        {{ session()->get('errordb') }}
    @endif --}}
    {{ session()->get('error') }}
    {{ session()->get('errordb') }}
</div>
