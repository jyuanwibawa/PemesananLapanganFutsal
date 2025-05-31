<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Register</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: #f2f2f2;
        }

        .auth-container {
            max-width: 450px;
            margin: 80px auto;
            padding: 30px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .auth-container img.logo {
            width: 100px;
            margin-bottom: 15px;
        }

        h2 {
            color: #333;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-left: 5px solid #28a745;
            border-radius: 6px;
            margin-bottom: 15px;
            text-align: left;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-left: 5px solid #dc3545;
            border-radius: 6px;
            margin-bottom: 15px;
            text-align: left;
        }

        form {
            display: flex;
            flex-direction: column;
            text-align: left;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        .input-group {
            position: relative;
            margin-bottom: 15px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            padding: 10px 40px 10px 10px;
            /* space for icon on right */
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            box-sizing: border-box;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            width: 24px;
            height: 24px;
            fill: #888;
            transition: fill 0.3s ease;
        }

        .toggle-password:hover {
            fill: #333;
        }

        button {
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
        }

        button:hover {
            background-color: #0056b3;
        }

        p {
            margin-top: 20px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="auth-container">
        <img src="/images/logo web.png" alt="Logo" class="logo" />
        <h2>Register</h2>

        @if(session('success'))
        <div class="success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
        <div class="error">
            <ul>
                @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <label>Nama:</label>
            <input type="text" name="nama" value="{{ old('nama') }}" required />

            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" required />

            <label>Password:</label>
            <div class="input-group">
                <input type="password" id="password" name="password" required />
                <svg class="toggle-password" onclick="togglePassword('password', this)"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M12 5c-7.633 0-11 6.667-11 7s3.367 7 11 7 11-6.667 11-7-3.367-7-11-7zm0 12c-2.761 0-5-2.239-5-5s2.239-5 5-5 5 2.239 5 5-2.239 5-5 5zm0-8c-1.654 0-3 1.346-3 3s1.346 3 3 3 3-1.346 3-3-1.346-3-3-3z" />
                </svg>
            </div>

            <label>Konfirmasi Password:</label>
            <div class="input-group">
                <input type="password" id="password_confirmation" name="password_confirmation" required />
                <svg class="toggle-password" onclick="togglePassword('password_confirmation', this)"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M12 5c-7.633 0-11 6.667-11 7s3.367 7 11 7 11-6.667 11-7-3.367-7-11-7zm0 12c-2.761 0-5-2.239-5-5s2.239-5 5-5 5 2.239 5 5-2.239 5-5 5zm0-8c-1.654 0-3 1.346-3 3s1.346 3 3 3 3-1.346 3-3-1.346-3-3-3z" />
                </svg>
            </div>

            <button type="submit">Register</button>
        </form>

        <p>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
    </div>

    <script>
        function togglePassword(id, icon) {
            const input = document.getElementById(id);
            if (input.type === "password") {
                input.type = "text";
                icon.style.fill = "#007bff"; // highlight icon
            } else {
                input.type = "password";
                icon.style.fill = "#888"; // default color
            }
        }
    </script>
</body>

</html>