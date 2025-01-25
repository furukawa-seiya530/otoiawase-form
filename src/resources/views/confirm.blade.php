<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ内容確認</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1>FashionablyLate</h1>
    </header>
    <div class="confirm-title">Confirm</div>
    <main>
        <div class="content-wrapper">
            <table>
                <tr>
                    <th>お名前</th>
                    <td>{{ $data['last_name'] }} {{ $data['first_name'] }}</td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td>{{ $data['gender'] }}</td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td>{{ $data['email'] }}</td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td>{{ $data['phone1'] }}-{{ $data['phone2'] }}-{{ $data['phone3'] }}</td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td>{{ $data['address'] }}</td>
                </tr>
                <tr>
                    <th>建物名</th>
                    <td>{{ $data['building'] }}</td>
                </tr>
                <tr>
                    <th>お問い合わせの種類</th>
                    <td>{{ $data['inquiry_type'] }}</td>
                </tr>
                <tr>
                    <th>お問い合わせ内容</th>
                    <td>{{ $data['inquiry_content'] }}</td>
                </tr>
            </table>
        </div>
        <div class="form-actions">
            <form action="{{ route('contact.submit') }}" method="POST" style="display: inline;">
                @csrf
                @foreach ($data as $key => $value)
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endforeach
                <button type="submit" class="submit-btn">送信</button>
            </form>
            <form action="{{ route('contact.form') }}" method="POST" style="display: inline;">
                @csrf
                @foreach ($data as $key => $value)
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endforeach
                <button type="submit" class="modify-btn">修正</button>
            </form>
        </div>
    </main>
</body>
</html>
