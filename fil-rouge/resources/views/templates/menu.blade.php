<input type="checkbox" class="toggler">
<div class="hamburger">
    <div></div>
</div>
<nav class="menu">
    <div>
        <ul>
            <li><a href="{{ route('tickets') }}">Tous les incidents</a></li>
            {{-- TODO get user id --}}
            <li><a href="{{ route('mytickets', ['idUser' => '82003']) }}">Mes incidents</a></li>
            <li><a href="{{ route('newticket') }}">Signaler un incident</a></li>
            <li><a href='#'>Se déconnecter</a></li>
            {{-- <li><a href='{{ route('logOut') }}'>Se déconnecter</a></li> --}}
        </ul>
    </div>
</nav>
