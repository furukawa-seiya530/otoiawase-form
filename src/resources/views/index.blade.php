<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせフォーム</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1>FashionablyLate</h1>
        <hr>
    </header>
    <main>
        <h2>Contact</h2>

        @if ($errors->any())
            <div class="error-summary" style="color: red; margin-bottom: 20px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('contact.confirm') }}" method="POST" novalidate>
            @csrf

            <div class="form-group">
                <label for="name">お名前 <span class="required">※</span></label>
                <div class="input-wrapper">
                    <input type="text" id="name" name="first_name" class="small-input" placeholder="例: 山田" value="{{ old('first_name', $data['first_name'] ?? '') }}" required>
                    <input type="text" id="name-kana" name="last_name" class="small-input" placeholder="例: 太郎" value="{{ old('last_name', $data['last_name'] ?? '') }}" required>
                </div>
            </div>

            <div class="form-group">
                <label for="gender">性別 <span class="required">※</span></label>
                <div class="radio-group">
                    <input type="radio" id="male" name="gender" value="男性"
                        {{ old('gender', $data['gender'] ?? '男性') === '男性' ? 'checked' : '' }}>
                    <label for="male">男性</label>
                    <input type="radio" id="female" name="gender" value="女性"
                        {{ old('gender', $data['gender'] ?? '男性') === '女性' ? 'checked' : '' }}>
                    <label for="female">女性</label>
                    <input type="radio" id="other" name="gender" value="その他"
                        {{ old('gender', $data['gender'] ?? '男性') === 'その他' ? 'checked' : '' }}>
                    <label for="other">その他</label>
                </div>
            </div>

            <div class="form-group">
                <label for="email">メールアドレス <span class="required">※</span></label>
                <input type="email" id="email" name="email" placeholder="例: test@example.com" value="{{ old('email', $data['email'] ?? '') }}" required>
            </div>

            <div class="form-group">
                <label for="phone">電話番号 <span class="required">※</span></label>
                <div class="phone-group">
                    <input type="tel" id="phone1" name="phone1" placeholder="080" value="{{ old('phone1', $data['phone1'] ?? '') }}" required>
                    <input type="tel" id="phone2" name="phone2" placeholder="1234" value="{{ old('phone2', $data['phone2'] ?? '') }}" required>
                    <input type="tel" id="phone3" name="phone3" placeholder="5678" value="{{ old('phone3', $data['phone3'] ?? '') }}" required>
                </div>
            </div>

            <div class="form-group">
                <label for="address">住所 <span class="required">※</span></label>
                <input type="text" id="address" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address', $data['address'] ?? '') }}" required>
            </div>

            <div class="form-group">
                <label for="building">建物名</label>
                <input type="text" id="building" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building', $data['building'] ?? '') }}">
            </div>

            <div class="form-group">
                <label for="category_id">お問い合わせの種類 <span class="required">※</span></label>
                <select id="category_id" name="category_id" required>
                    <option value="1" {{ old('category_id', $data['category_id'] ?? '') == 1 ? 'selected' : '' }}>商品のお届けについて</option>
                    <option value="2" {{ old('category_id', $data['category_id'] ?? '') == 2 ? 'selected' : '' }}>商品の交換について</option>
                    <option value="3" {{ old('category_id', $data['category_id'] ?? '') == 3 ? 'selected' : '' }}>商品トラブル</option>
                    <option value="4" {{ old('category_id', $data['category_id'] ?? '') == 4 ? 'selected' : '' }}>ショップへのお問い合わせ</option>
                    <option value="5" {{ old('category_id', $data['category_id'] ?? '') == 5 ? 'selected' : '' }}>その他</option>
                </select>
            </div>

            <div class="form-group inquiry-content-group">
                <label for="inquiry-content">お問い合わせ内容 <span class="required">※</span></label>
                <textarea id="inquiry-content" name="inquiry_content" placeholder="お問い合わせ内容をご記載ください" required>{{ old('inquiry_content', $data['inquiry_content'] ?? '') }}</textarea>
            </div>

            <div class="form-submit">
                <button type="submit">確認画面</button>
            </div>
        </form>
    </main>
</body>
</html>




