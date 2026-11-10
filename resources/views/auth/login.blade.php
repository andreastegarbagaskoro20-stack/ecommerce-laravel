<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Katalog Produk</title>
    <link
        rel="icon"
        type="image/png"
        href="https://cdn-icons-png.flaticon.com/512/9453/9453183.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .login-box {
            background: white;
            padding: 30px;
            border-radius: 12px;
            width: 100%;
            max-width: 360px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 24px;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 6px;
        }

        input {
            box-sizing: border-box;
            width: 100%;
            padding: 11px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button {
            width: 100%;
            margin-top: 22px;
            padding: 12px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .message {
            background: #fee2e2;
            color: #991b1b;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 12px;
        }

        .success {
            background: #dcfce7;
            color: #166534;
        }

        .register-link {
            text-align: center;
            margin-top: 18px;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <h2>Login Katalog Produk</h2>

        @if (session('success'))
        <div class="message success">
            {{ session('success') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="message">
            @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
            @endforeach
        </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <label for="username">Username</label>
            <input
                type="text"
                id="username"
                name="username"
                value="{{ old('username') }}"
                required
                autofocus>

            <label for="password">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                required>

            <button type="submit">Login</button>
        </form>

        <div class="register-link">
            Belum punya akun?
            <a href="{{ route('register') }}">Daftar di sini</a>
        </div>
    </div>
</body>

</html>