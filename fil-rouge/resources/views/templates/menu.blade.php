<input type="checkbox" class="toggler">
<div class="hamburger">
    <div></div>
</div>
<nav class="menu">
    <div>
        <ul>
            <li><a href="{{ route('tickets') }}">Tous les incidents</a></li>
            <li><a href="{{ route('mytickets', ['idUser' => '82001']) }}">Mes incidents</a></li>
            <li><a href="#">Signaler un incident</a></li>
            <li><a href='#'>Se déconnecter</a></li>
            {{-- <li><a href='{{ route('logOut') }}'>Se déconnecter</a></li> --}}
        </ul>
    </div>
</nav>
