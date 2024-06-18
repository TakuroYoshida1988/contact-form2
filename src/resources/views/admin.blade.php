<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>管理画面</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <div class="container">
        <h1>お問い合わせ管理</h1>
        <table>
            <thead>
                <tr>
                    <th>お名前</th>
                    <th>性別</th>
                    <th>メールアドレス</th>
                    <th>お問い合わせの種類</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                        <td>
                            @if ($contact->gender == 1)
                              男性
                            @elseif ($contact->gender == 2)
                              女性
                            @elseif ($contact->gender == 3)
                              その他
                            @endif
                        </td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->category->content }}</td>
                       </a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{ $contacts->links() }}
        </div>
    </div>
</body>
</html>