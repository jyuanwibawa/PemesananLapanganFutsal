<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
</head>

<body>
    <div class="wrapper">

        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            @include('layouts.header')

            <!-- Konten utama -->
            <section>
                <h2>Dashboard Admin</h2>
                <p>Konten dashboard ada di sini.</p>
            </section>
        </div>

    </div>
</body>

</html>