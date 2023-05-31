<input type="checkbox" class="toggler">
<div class="hamburger">
    <div></div>
</div>
<nav class="menu">
    <div>
        <ul>
            @auth
                <li><a href="{{ route('tickets') }}">Tous les incidents</a></li>
                {{-- TODO get user id --}}
                <li><a href="{{ route('mytickets', ['iduser' => Auth::id()]) }}">Mes incidents</a></li>
                <li><a href="{{ route('newticket') }}">Signaler un incident</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" hidden>
                        @csrf
                        <button class="bt_logout" name="">Se déconnecter</button>
                    </form>
                </li>
            @endauth
            @guest
                <li><a href="{{ route('home') }}">Me connecter</a></li>
            @endguest
        </ul>
    </div>
</nav>
