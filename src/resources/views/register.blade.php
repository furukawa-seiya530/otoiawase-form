<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika&display=swap" rel="stylesheet">
    <title>Register</title>
</head>
<body>
    <header>
        <h1>FashionablyLate</h1>
        <a href="{{ route('login') }}" class="login-btn">Login</a>
    </header>

    <h2 class="register-title">Register</h2>

    <main>
        <div class="container">
            <form action="{{ route('register.submit') }}" method="POST" novalidate>
                @csrf

                <label for="name">お名前</label>
                <input type="text" id="name" name="name" placeholder="例: 山田 太郎" value="{{ old('name') }}">
                @error('name')
                    <div class="error-message" style="color: red;">{{ $message }}</div>
                @enderror

                <label for="email">メールアドレス</label>
                <input type="email" id="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                @error('email')
                    <div class="error-message" style="color: red;">{{ $message }}</div>
                @enderror

                <label for="password">パスワード</label>
                <input type="password" id="password" name="password" placeholder="例: coachtech1106">
                @error('password')
                    <div class="error-message" style="color: red;">{{ $message }}</div>
                @enderror

                <div class="submit-button">
                    <button type="submit">登録</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>




