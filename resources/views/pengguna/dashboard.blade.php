<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pemesanan Lapangan Futsal</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&family=Open+Sans&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f4f6f8;
            color: #222;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        nav {
            background-color: #333;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 2rem;
        }

        nav ul li {
            font-weight: 600;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #FF5A00;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
            font-weight: 600;
        }

        form.logout-form {
            margin: 0;
        }

        button.logout-btn {
            background-color: #dc3545;
            border: none;
            color: white;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        button.logout-btn:hover {
            background-color: #c82333;
        }

        header {
            background: url('https://images.unsplash.com/photo-1564135624576-c5c88640f235?auto=format&fit=crop&w=1470&q=80') center/cover no-repeat;
            height: 100vh;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #fff;
            text-align: center;
            padding: 0 1rem;
        }

        header::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.55);
            z-index: 0;
        }

        header h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 3.8rem;
            z-index: 1;
            margin-bottom: 0.5rem;
            text-shadow: 0 4px 10px rgba(0, 0, 0, 0.7);
        }

        header p {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 2rem;
            z-index: 1;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.6);
        }

        .btn-book {
            background-color: #FF5A00;
            border: none;
            padding: 1.2rem 3.2rem;
            font-size: 1.2rem;
            font-weight: 700;
            color: #fff;
            border-radius: 50px;
            cursor: pointer;
            box-shadow: 0 5px 20px rgba(255, 90, 0, 0.6);
            transition: background-color 0.25s ease, transform 0.3s ease;
            z-index: 1;
            text-transform: uppercase;
            letter-spacing: 1.1px;
            user-select: none;
        }

        .btn-book:hover {
            background-color: #FF7F32;
            transform: scale(1.07);
            box-shadow: 0 7px 28px rgba(255, 127, 50, 0.75);
        }

        main {
            max-width: 1000px;
            margin: 3rem auto 5rem;
            padding: 0 1rem;
            color: #333;
        }

        section.features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2.5rem;
        }

        .feature-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            padding: 2.5rem 2rem;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            user-select: none;
            cursor: default;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.12);
        }

        .feature-icon {
            font-size: 3.5rem;
            color: #FF5A00;
            margin-bottom: 1.3rem;
            user-select: none;
        }

        .feature-title {
            font-family: 'Poppins', sans-serif;
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #222;
        }

        .feature-desc {
            font-size: 1.1rem;
            line-height: 1.4;
            color: #555;
            user-select: none;
        }

        .field-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            padding: 1rem;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            user-select: none;
            cursor: default;
        }

        .field-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.12);
        }

        .field-title {
            font-family: 'Poppins', sans-serif;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            color: #222;
        }

        .field-info {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 1rem;
        }

        .field-image {
            width: 100%;
            height: auto;
            border-radius: 12px 12px 0 0;
        }

        .btn-details {
            background-color: #007bff;
            border: none;
            padding: 0.8rem 2rem;
            font-size: 1rem;
            font-weight: 700;
            color: #fff;
            border-radius: 50px;
            cursor: pointer;
            box-shadow: 0 5px 20px rgba(0, 123, 255, 0.6);
            transition: background-color 0.25s ease, transform 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1.1px;
            user-select: none;
        }

        .btn-details:hover {
            background-color: #0056b3;
            transform: scale(1.05);
            box-shadow: 0 7px 28px rgba(0, 123, 255, 0.75);
        }

        footer {
            background-color: #222;
            color: #ddd;
            padding: 1.5rem 1rem;
            text-align: center;
            font-size: 0.9rem;
            user-select: none;
            margin-top: auto;
        }

        @media (max-width: 768px) {
            header h1 {
                font-size: 2.7rem;
            }

            header p {
                font-size: 1.1rem;
            }

            .btn-book {
                padding: 1rem 2.5rem;
                font-size: 1rem;
            }

            nav {
                flex-direction: column;
                gap: 1rem;
            }

            nav ul {
                gap: 1rem;
            }
        }
    </style>
</head>

<body>
    <nav>
        <ul>
            <li><a href="#history">History</a></li>
            <li><a href="#booking">Booking</a></li>
        </ul>
        <div class="user-info">
            <span>Hai, {{ auth('pengguna')->user()->nama }}</span>
            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </nav>

    <header>
        <h1>Pesan Lapangan Futsalmu Sekarang!</h1>
        <p>Praktis, cepat, dan mudah dengan layanan pemesanan online kami.</p>
        <button class="btn-book" onclick="alert('Fitur pemesanan segera hadir!')">Booking Sekarang</button>
    </header>

    <main>
        <section class="features" aria-label="Fitur layanan pemesanan">
            <article class="feature-card" tabindex="0">
                <div class="feature-icon">🏆</div>
                <h2 class="feature-title">Lapangan Berkualitas</h2>
                <p class="feature-desc">Kami menyediakan lapangan dengan standar terbaik dan terawat secara rutin.</p>
            </article>
            <article class="feature-card" tabindex="0">
                <div class="feature-icon">🌐</div>
                <h2 class="feature-title">Pemesanan 24/7</h2>
                <p class="feature-desc">Booking kapan saja dan di mana saja melalui website kami yang responsif.</p>
            </article>
            <article class="feature-card" tabindex="0">
                <div class="feature-icon">📱</div>
                <h2 class="feature-title">Konfirmasi Instan</h2>
                <p class="feature-desc">Dapatkan notifikasi cepat setelah pemesanan, tanpa menunggu lama.</p>
            </article>
            <article class="feature-card" tabindex="0">
                <div class="feature-icon">⏰</div>
                <h2 class="feature-title">Jam Operasional Fleksibel</h2>
                <p class="feature-desc">Lapangan buka dari pagi hingga malam, menyesuaikan jadwalmu.</p>
            </article>
        </section>

        <section id="booking" class="available-fields" aria-label="Daftar Lapangan Futsal yang Tersedia"
            style="margin-top:3rem;">
            <h2>Daftar Lapangan Futsal yang Tersedia</h2>
            <section class="fields"
                style="display:grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap:1.5rem; margin-top:1rem;">
                @forelse ($lapangan as $lap)
                <article class="field-card" tabindex="0">
                    @if($lap->gambar)
                    <img src="{{ asset('storage/' . $lap->gambar) }}" alt="Foto Lapangan {{ $lap->nama }}"
                        class="field-image" />
                    @else
                    <img src="https://via.placeholder.com/400x250?text=No+Image" alt="Tidak ada gambar lapangan"
                        class="field-image" />
                    @endif
                    <h3 class="field-title">{{ $lap->nama }}</h3>
                    <p class="field-info">Kapasitas: {{ $lap->kapasitas }} pemain</p>
                    <p class="field-info">Harga per jam: Rp {{ number_format($lap->harga, 0, ',', '.') }}</p>
                    <button class="btn-details" onclick="alert('Detail lapangan: {{ addslashes($lap->nama) }}')">Lihat
                        Detail</button>
                </article>
                @empty
                <p>Tidak ada lapangan yang tersedia saat ini.</p>
                @endforelse
            </section>
        </section>
    </main>

    <footer>
        &copy; 2025 Futsal Booking. Semua hak cipta dilindungi.
    </footer>
</body>

</html>