<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pemesanan</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        /* Booking History Section Styles */
        .booking-history {
            max-width: 800px;
            margin: auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        /* Messages Styles */
        .success-message,
        .error-message {
            margin: 1rem 0;
            border-radius: 5px;
            padding: 15px;
            color: #fff;
            text-align: center;
        }

        .success-message {
            background-color: #4CAF50;
        }

        .error-message {
            background-color: #f44336;
        }

        /* Booking List Styles */
        .booking-list {
            margin-top: 20px;
        }

        .booking-card {
            border: 1px solid #e0e0e0;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .booking-card:hover {
            transform: translateY(-3px);
        }

        /* Booking Info Styles */
        .field-info {
            margin: 5px 0;
            font-size: 1.1rem;
            line-height: 1.5;
        }

        .field-info span {
            color: #333;
        }

        /* Status Color Styles */
        .status {
            font-weight: bold;
        }

        .status-terkonfirmasi {
            color: green;
        }

        .status-pending {
            color: orange;
        }

        .status-cancelled {
            color: red;
        }

        /* Payment Button Styles */
        .btn-details {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .btn-details:hover {
            background-color: #0056b3;
        }

        /* Modal Styles */
        .payment-modal {
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

        .payment-modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 20px;
            border-radius: 8px;
            width: 80%;
            max-width: 400px;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.2);
        }

        /* Upload Group Styles */
        .upload-group {
            margin-top: 20px;
            text-align: center;
        }

        .upload-group label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        /* Modal Button Styles */
        .modal-button {
            background-color: #28a745;
            border: none;
            color: white;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .modal-button:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <main>
        <section id="booking-history" class="booking-history" aria-label="Riwayat Pemesanan" style="margin-top: 3rem;">
            <h2>Riwayat Pemesanan</h2>

            @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
            @endif

            @if (session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
            @endif
            <div class="booking-list">
                @forelse($bookings as $booking)
                <article class="booking-card">
                    <h3>Pemesanan ID: {{ $booking->id }}</h3>
                    <p class="field-info">Lapangan: {{ $booking->lapangan->nama_lapangan }}</p>
                    <p class="field-info">Tanggal: {{ date('d-m-Y', strtotime($booking->tanggal_booking)) }}</p>
                    <p class="field-info">Jam: {{ $booking->jam_mulai }} - {{ $booking->jam_selesai }}</p>
                    <p class="field-info">Harga per Jam: Rp
                        {{ number_format($booking->lapangan->harga_per_jam, 0, ',', '.') }}
                    </p>

                    @php
                    // Calculate total price
                    $startTime = new DateTime($booking->jam_mulai);
                    $endTime = new DateTime($booking->jam_selesai);
                    $duration = $startTime->diff($endTime);
                    $hours = (int)$duration->h + ($duration->i > 0 ? 1 : 0); // Round up if there are minutes
                    $totalPrice = $hours * $booking->lapangan->harga_per_jam;
                    @endphp
                    <p class="field-info">Total Harga: Rp {{ number_format($totalPrice, 0, ',', '.') }}</p>

                    <p class="field-info">Status Pemesanan:
                        <span
                            class="status {{ $booking->status === 'terkonfirmasi' ? 'status-terkonfirmasi' : ($booking->status === 'pending' ? 'status-pending' : 'status-cancelled') }}">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </p>

                    @if($booking->status === 'pending')
                    <p class="field-info"><strong>Maaf, Anda tidak bisa melakukan pembayaran.</strong></p>
                    <p class="field-info">Komentar: "Pemesanan Anda saat ini masih dalam proses. Silakan tunggu beberapa
                        saat hingga pemesanan ini dikonfirmasi."</p>
                    @elseif($booking->status === 'terkonfirmasi')
                    <p class="field-info"><strong>Pembayaran sudah terkonfirmasi. Anda tidak perlu melakukan pembayaran
                            lagi.</strong></p>
                    <button class="btn-details" disabled>
                        Pembayaran Sudah Dikonfirmasi
                    </button>
                    @elseif($booking->status === 'ditolak')
                    <p class="field-info"><strong>Maaf, Anda tidak bisa melakukan pembayaran.</strong></p>
                    <p class="field-info">Komentar: "Maaf, pemesanan Anda telah ditolak. Anda tidak dapat melakukan
                        pembayaran."</p>
                    @endif

                    <!-- Menampilkan status pembayaran -->
                    @if($booking->pembayaran)
                    <!-- Pastikan ada relasi untuk Melihat status pembayaran -->
                    <p class="field-info">Status Pembayaran:
                        <span
                            class="status 
                {{ $booking->pembayaran->status_verifikasi === 'pending' ? 'status-pending' : ($booking->pembayaran->status_verifikasi === 'terkonfirmasi' ? 'status-terkonfirmasi' : 'status-cancelled') }}">
                            {{ ucfirst($booking->pembayaran->status_verifikasi) }}
                        </span>
                    </p>

                    @if($booking->pembayaran->status_verifikasi === 'pending')
                    <p class="field-info"><strong>Menunggu konfirmasi pembayaran.</strong></p>
                    @elseif($booking->pembayaran->status_verifikasi === 'terkonfirmasi')
                    <p class="field-info"><strong>Pembayaran telah terkonfirmasi!</strong></p>
                    @elseif($booking->pembayaran->status_verifikasi === 'ditolak')
                    <p class="field-info"><strong>Pembayaran Anda ditolak. Silakan coba lagi.</strong></p>
                    @endif
                    @endif
                </article>
                @empty
                <p>Tidak ada riwayat pemesanan.</p>
                @endforelse
            </div>
            <div id="paymentModal" class="payment-modal">
                <div class="payment-modal-content">
                    <span class="close" onclick="closePaymentModal()">&times;</span>
                    <h2>Detail Pembayaran</h2>
                    <p><strong>ID Booking:</strong> <span id="modalBookingId"></span></p>
                    <p><strong>ID Pengguna:</strong> <span id="modalUserId"></span></p>
                    <p><strong>Lapangan:</strong> <span id="modalField"></span></p>
                    <p><strong>Tanggal:</strong> <span id="modalDate"></span></p>
                    <p><strong>Jam:</strong> <span id="modalTime"></span></p>

                    <form id="paymentForm" method="POST" action="{{ route('create.pembayaran') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_booking" id="bookingId" value="" />

                        <div class="upload-group">
                            <label for="uploadImage">Upload Bukti Pembayaran</label>
                            <input type="file" id="uploadImage" name="bukti_bayar" required accept="image/*" />
                        </div>
                        <div class="upload-group">
                            <label for="metode_bayar">Metode Pembayaran</label>
                            <select name="metode_bayar" id="metode_bayar" required>
                                <option value="Transfer Bank">Transfer Bank</option>
                                <option value="Doku">Doku</option>
                                <option value="OVO">OVO</option>
                                <option value="Gopay">Gopay</option>
                            </select>
                        </div>
                        <button type="submit" class="modal-button">Kirim Pembayaran</button>
                    </form>
                </div>
            </div>

        </section>
    </main>

    <script>
        function showPaymentForm(bookingId, userId, field, date, time) {
            // Mengisi informasi dalam modal
            document.getElementById('modalBookingId').innerText = bookingId;
            document.getElementById('modalUserId').innerText = userId;
            document.getElementById('modalField').innerText = field;
            document.getElementById('modalDate').innerText = date;
            document.getElementById('modalTime').innerText = time;

            // Mengatur hidden input booking ID
            document.getElementById('bookingId').value = bookingId; // ID booking yang akan dikirim
            document.getElementById('paymentModal').style.display = 'block';
        }

        function closePaymentModal() {
            document.getElementById('paymentModal').style.display = 'none';
            document.getElementById('uploadImage').value = ''; // Kosongkan input file
            document.getElementById('metode_bayar').selectedIndex = 0; // Reset dropdown metode pembayaran
        }

        // Penanganan klik di luar modal untuk menutup
        window.onclick = function(event) {
            const modal = document.getElementById('paymentModal');
            if (event.target === modal) {
                closePaymentModal();
            }
        }
    </script>
</body>

</html>