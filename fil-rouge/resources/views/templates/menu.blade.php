<input type="checkbox" class="toggler">
<div class="hamburger">
    <div></div>
</div>
<nav class="menu">
    <div>
        <ul>
            <li><a href="{{ route('tickets') }}">Tous les incidents</a></li>
            {{-- TODO get user id --}}
            <li><a href="{{ route('mytickets', ['iduser' => session()->get('idUser')]) }}">Mes incidents</a></li>
            <li><a href="{{ route('newticket') }}">Signaler un incident</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}" hidden>
                    @csrf
                    <button class="bt_logout" name="">Se déconnecter</button>
                </form>
            </li>
        </ul>
    </div>
</nav>
