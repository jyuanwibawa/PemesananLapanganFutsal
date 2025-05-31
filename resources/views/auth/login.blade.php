<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="/css/auth.css">
</head>

<body>
    <div class="auth-container">
        <h2>Login</h2>
        @if(session('error'))
        <div class="alert">{{ session('error') }}</div>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
            <p>Belum punya akun? <a href="{{ route('register') }}">Register</a></p>
        </form>
    </div>
</body>

</html>