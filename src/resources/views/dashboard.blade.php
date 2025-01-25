<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1>FashionablyLate</h1>
        <a href="#" class="logout">logout</a>
    </header>
    <main>
        <div class="admin-title">Admin</div>
        <div class="search-section">
            <form action="{{ route('dashboard.index') }}" method="GET">
                <input type="text" class="long-input" name="name" placeholder="名前やメールアドレスを入力してください" value="{{ request('name') }}">
                <select name="gender">
                    <option value="">性別</option>
                    <option value="男性" {{ request('gender') == '男性' ? 'selected' : '' }}>男性</option>
                    <option value="女性" {{ request('gender') == '女性' ? 'selected' : '' }}>女性</option>
                    <option value="その他" {{ request('gender') == 'その他' ? 'selected' : '' }}>その他</option>
                </select>
                <select name="category_id">
                    <option value="">お問い合わせの種類</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->content }}
                        </option>
                    @endforeach
                </select>
                <input type="date" name="date" value="{{ request('date') }}">
                <button type="submit">検索</button>
                <a href="{{ route('dashboard.index') }}" class="reset-btn">リセット</a>
            </form>
        </div>
        <div class="pagination">
            @for ($i = 1; $i <= $pagination['total_pages']; $i++)
                <a href="?page={{ $i }}" class="{{ $i == $pagination['current_page'] ? 'active' : '' }}">
                    {{ $i }}
                </a>
            @endfor
        </div>
        <div class="table-section">
            <table>
                <thead>
                    <tr>
                        <th>お名前</th>
                        <th>性別</th>
                        <th>メールアドレス</th>
                        <th>お問い合わせの種類</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                            <td>
                                @php
                                    $genderLabels = ['1' => '男性', '2' => '女性', '3' => 'その他'];
                                @endphp
                                {{ $genderLabels[$contact->gender] ?? '不明' }}
                            </td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->category->content }}</td>
                            <td>
                                <a href="#modal-{{ $contact->id }}" class="details-btn">詳細</a>
                            </td>
                        </tr>
                        <!-- モーダルウィンドウ -->
                        <div id="modal-{{ $contact->id }}" class="modal">
                            <div class="modal-content">
                                <a href="#" class="modal-close">&times;</a>
                                <p>お名前: {{ $contact->last_name }} {{ $contact->first_name }}</p>
                                <p>性別: {{ $genderLabels[$contact->gender] ?? '不明' }}</p>
                                <p>メールアドレス: {{ $contact->email }}</p>
                                <p>電話番号: {{ $contact->tel }}</p>
                                <p>住所: {{ $contact->address }}</p>
                                <p>建物名: {{ $contact->building }}</p>
                                <p>お問い合わせの種類: {{ $contact->category->content }}</p>
                                <p>お問い合わせ内容: {{ $contact->detail }}</p>
                                <form method="POST" action="{{ route('dashboard.destroy', $contact->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn">削除</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
