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

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 800px;
            border-radius: 8px;
            display: flex;
        }

        .modal-image {
            flex: 1;
            padding-right: 20px;
        }

        .modal-details {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .modal-button {
            background-color: #007bff;
            border: none;
            padding: 1rem;
            font-size: 1rem;
            font-weight: 700;
            color: #fff;
            border-radius: 50px;
            cursor: pointer;
            transition: background-color 0.25s ease;
            text-align: center;
            margin-top: auto;
        }

        .modal-button:hover {
            background-color: #0056b3;
        }

        /* Form Modal Styles */
        .form-modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .form-modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
            border-radius: 8px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .total-hours {
            margin-top: 10px;
            font-weight: bold;
        }

        /* Success Message Styles */
        .success-message {
            display: none;
            position: fixed;
            z-index: 1001;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .success-message h3 {
            margin-bottom: 10px;
            color: #4CAF50;
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

            .modal-content {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .modal-image {
                padding-right: 0;
                margin-bottom: 15px;
            }
        }
    </style>
</head>

<body>
    <nav>
        <ul>
            <li><a href="{{ route('pemesanan.index') }}">Riwayat</a></li>
            <li><a href="#booking">Pemesanan</a></li>
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
                <article class="field-card" tabindex="0"
                    style="border: 1px solid #ccc; padding: 1rem; border-radius: 8px;">
                    <img src="{{ $lap->gambar ? asset('storage/' . $lap->gambar) : 'https://via.placeholder.com/400x250?text=No+Image' }}"
                        alt="Foto Lapangan {{ $lap->nama_lapangan }}" class="field-image"
                        style="width:100%; height:200px; object-fit:cover;" />
                    <h3 class="field-title" style="margin-top: 1rem;">{{ $lap->nama_lapangan }}</h3>
                    <p class="field-info">Deskripsi: {{ $lap->deskripsi }}</p>
                    @if(isset($lap->kapasitas))
                    <p class="field-info">Kapasitas: {{ $lap->kapasitas }} pemain</p>
                    @endif
                    <p class="field-info">Harga per jam: Rp {{ number_format($lap->harga_per_jam, 0, ',', '.') }}</p>
                    <p class="field-info">Status: <span
                            style="color: {{ $lap->status_aktif ? 'green' : 'red' }}; font-weight: bold;">{{ $lap->status_aktif ? 'Aktif' : 'Tidak Aktif' }}</span>
                    </p>
                    <button class="btn-details"
                        onclick="showDetails('{{ addslashes($lap->id) }}', '{{ addslashes($lap->nama_lapangan) }}', '{{ addslashes($lap->deskripsi) }}', '{{ number_format($lap->harga_per_jam, 0, ',', '.') }}', '{{ $lap->gambar ? asset('storage/' . $lap->gambar) : 'https://via.placeholder.com/400x250?text=No+Image' }}', '{{ json_encode($lap->fasilitas) }}')">Lihat
                        Detail</button>
                </article>
                @empty
                <p>Tidak ada lapangan yang tersedia saat ini.</p>
                @endforelse
            </section>
        </section>
    </main>

    <!-- Modal for Field Details -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div class="modal-image">
                <img id="modalImage" src="" alt="" style="width: 100%; height: auto; border-radius: 8px;" />
            </div>
            <div class="modal-details">
                <h2 id="modalTitle"></h2>
                <p id="modalPrice"></p>
                <p id="modalDescription"></p>
                <h4>Fasilitas:</h4>
                <ul id="modalFacilities"></ul>
                <button class="modal-button" onclick="showBookingForm()">Pesan</button>
            </div>
        </div>
    </div>

    <div id="bookingModal" class="form-modal">
        <div class="form-modal-content">
            <span class="close" onclick="closeBookingForm()">&times;</span>
            <h2>Pemesanan</h2>
            <form id="bookingForm" method="POST" action="{{ route('create.booking') }}">
                @csrf
                <input type="hidden" id="idLapangan" name="id_lapangan" value="" />

                <!-- Tampilkan nama lapangan dan harga per jam -->
                <div class="form-group" id="fieldInfo">
                    <label>Nama Lapangan</label>
                    <p id="bookingFieldTitle"></p>
                </div>
                <div class="form-group">
                    <label>Harga per Jam</label>
                    <p id="bookingPrice"></p>
                </div>
                <div class="form-group">
                    <label for="namaPemesanan">Nama Pemesanan</label>
                    <input type="text" id="namaPemesanan" name="namaPemesanan"
                        value="{{ auth('pengguna')->user()->nama }}" readonly />
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" id="tanggal" name="tanggal_booking" required />
                </div>
                <div class="form-group">
                    <label for="jamMulai">Jam Mulai</label>
                    <input type="time" id="jamMulai" name="jam_mulai" required onchange="calculateHours()" />
                </div>
                <div class="form-group">
                    <label for="jamSelesai">Jam Selesai</label>
                    <input type="time" id="jamSelesai" name="jam_selesai" required onchange="calculateHours()" />
                </div>
                <div class="total-hours" id="totalHours"></div>
                <button type="submit" class="modal-button">Konfirmasi Pemesanan</button>
            </form>
        </div>
    </div>

    <footer>
        &copy; 2025 Futsal Booking. Semua hak cipta dilindungi.
    </footer>

    <script>
        // Menampilkan detail lapangan dan fasilitas
        function showDetails(id, title, description, price, image, facilities) {
            document.getElementById("modalTitle").innerText = title;
            document.getElementById("modalDescription").innerText = description;
            document.getElementById("modalPrice").innerText = "Harga per jam: Rp " + price;
            document.getElementById("modalImage").src = image;

            // Set ID lapangan dan tampilkan informasi di form pemesanan
            document.getElementById("idLapangan").value = id; // Ambil ID lapangan
            document.getElementById("bookingFieldTitle").innerText = title; // Nama lapangan
            document.getElementById("bookingPrice").innerText = "Rp " + price; // Harga per jam

            // Mengeluarkan fasilitas ke dalam daftar
            const modalFacilities = document.getElementById("modalFacilities");
            modalFacilities.innerHTML = ''; // Kosongkan daftar fasilitas sebelumnya
            const facilitiesList = JSON.parse(facilities);
            facilitiesList.forEach(facility => {
                const listItem = document.createElement('li');
                listItem.innerText = facility.nama_fasilitas + " - " + facility.deskripsi;
                modalFacilities.appendChild(listItem);
            });

            document.getElementById("myModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("myModal").style.display = "none";
        }

        function showBookingForm() {
            document.getElementById("bookingModal").style.display = "block";
        }

        function closeBookingForm() {
            document.getElementById("bookingModal").style.display = "none";
            document.getElementById("totalHours").innerText = '';
            document.getElementById("jamMulai").value = '';
            document.getElementById("jamSelesai").value = '';
            document.getElementById("idLapangan").value = ''; // Reset ID lapangan
            document.getElementById("bookingFieldTitle").innerText = ''; // Reset nama lapangan
            document.getElementById("bookingPrice").innerText = ''; // Reset harga per jam
        }

        function calculateHours() {
            const jamMulai = document.getElementById("jamMulai").value;
            const jamSelesai = document.getElementById("jamSelesai").value;

            if (jamMulai && jamSelesai) {
                const startTime = new Date(`1970-01-01T${jamMulai}:00`);
                const endTime = new Date(`1970-01-01T${jamSelesai}:00`);

                let hours = (endTime - startTime) / (1000 * 60 * 60); // Convert milliseconds to hours
                if (hours < 0) {
                    hours += 24; // Handle overnight booking
                }

                const pricePerHour = parseInt(document.getElementById("modalPrice").innerText.split('Rp ')[1].replace('.',
                    ''));
                const totalPrice = hours * pricePerHour;

                document.getElementById("totalHours").innerText = `Total Jam: ${hours} jam`;
                // Uncomment if needed in payment modal
                // document.getElementById("paymentTotalHours").innerText = `Total Jam: ${hours} jam`;
                // document.getElementById("paymentPricePerHour").innerText = `Harga per jam: Rp ${pricePerHour.toLocaleString()}`;
                // document.getElementById("paymentTotal").innerText = `Total Pembayaran: Rp ${totalPrice.toLocaleString()}`;
            }
        }

        // Close modal when the user clicks anywhere outside of the modal
        window.onclick = function(event) {
            const modal = document.getElementById("myModal");
            if (event.target === modal) {
                modal.style.display = "none";
            }

            const bookingModal = document.getElementById("bookingModal");
            if (event.target === bookingModal) {
                bookingModal.style.display = "none";
            }
        }
    </script>
</body>

</html>