<aside class="sidebar">
    <div class="logo">
        Admin Panel
    </div>
    <nav>
        <ul>
            <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>

            <li class="{{ request()->routeIs('admin.lapangan.*') ? 'active' : '' }}">
                <a href="{{ route('admin.lapangan.index') }}">Pengelolaan Lapangan</a>
            </li>

            <li class="{{ request()->routeIs('admin.booking.history') ? 'active' : '' }}">
                <a href="{{ route('admin.booking.history') }}">Riwayat Booking</a>
            </li>

            <li class="{{ request()->routeIs('admin.fasilitas.*') ? 'active' : '' }}">
                <a href="{{ route('admin.fasilitas.index') }}">Pengelolaan Fasilitas</a>
            </li>

            <li class="{{ request()->routeIs('admin.pembayaran.*') ? 'active' : '' }}">
                <a href="{{ route('admin.pembayaran.index') }}">Pengelolaan Pembayaran</a>
            </li>
        </ul>
    </nav>
</aside>