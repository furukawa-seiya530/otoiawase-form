<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <header>
        <h1>FashionablyLate</h1>
        <a href="{{ route('register') }}" class="register-btn">register</a>
    </header>
    <h2 class="login-title">Login</h2>
    <main>
        <div class="login-container">
            <form action="{{ route('login.submit') }}"method="POST" novalidate>
                @csrf
                <label for="email">メールアドレス</label>
                <input type="email" id="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                @error('email')
                    <div style="color: red;">{{ $message }}</div>
                @enderror

                <label for="password">パスワード</label>
                <input type="password" id="password" name="password" placeholder="例: coachtech1106">
                @error('password')
                    <div style="color: red;">{{ $message }}</div>
                @enderror

                <div class="submit-button">
                    <button type="submit">ログイン</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>


