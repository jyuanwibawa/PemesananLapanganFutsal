<header class="header">
    <div class="welcome">
        Selamat datang, {{ auth('pengguna')->user()->nama }}
    </div>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</header>