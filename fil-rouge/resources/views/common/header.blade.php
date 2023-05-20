<style>
    nav ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    nav li {
        display: inline-block;
        margin-right: 20px;
    }

    nav li:last-child {
        margin-right: 0;
    }

    nav a {
        display: block;
        padding: 5px 10px;
        text-decoration: none;
        color: #333;
        font-weight: bold;
    }

    nav a:hover {
        background-color: #333;
        color: #fff;
    }
</style>
<nav>
    <ul>
        @if (!auth()->check())
            <li>
                <a href="{!! url('/register/index') !!}">
                    REGISTER
                </a>
            </li>
            <li>
                <a href="{!! url('/login/index') !!}">
                    LOGIN
                </a>
            </li>
        @endif
        <li>
            <a href="{!! url('/topic/index') !!}">
                HOME
            </a>
        </li>
        <li>
            <a href="{!! url('/topic/index') !!}">
                TOPIC LISTING
            </a>
        </li>
        @if (auth()->check())
            <li>
                <a href="{!! url('/topic/create') !!}">
                    CREATE TOPIC
                </a>
            </li>
        @endif
    </ul>
</nav>
@if (auth()->check())
    <div style="text-align: right;">
        Welcome, {{ auth()->user()->name }} (<a href="{!! url('/logout') !!}">Logout</a>)
    </div>
@endif
