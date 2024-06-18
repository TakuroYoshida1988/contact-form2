<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Form</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <a class="header__logo" href="/">
        FashionablyLate
      </a>
    </div>
  </header>

  <main>
    <div class="confirm__content">
      <div class="confirm__heading">
        <h2>Confirm</h2>
      </div>
      <form class="form" action="/thanks" method="post">
       @csrf
        <div class="confirm-table">
          <table class="confirm-table__inner">
            <tr class="confirm-table__row">
              <th class="confirm-table__header">お名前</th>
              <td class="confirm-table__text">
                <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" />
                <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}" />
                <input type="text" value="{{ $contact['last_name'] . ' ' . $contact['first_name']}}" readonly />
              </td>
            </tr>
            <tr class="confirm-table__row">
             <th class="confirm-table__header">性別</th>
                <td class="confirm-table__text">
                @if ($contact['gender'] == 1)
                <input type="hidden" name="gender" value="1" />
                <input type="text" value="男性" readonly />
                @elseif ($contact['gender'] == 2)
                <input type="hidden" name="gender" value="2" />
                <input type="text" value="女性" readonly />
                @elseif ($contact['gender'] == 3)
                <input type="hidden" name="gender" value="3" />
                <input type="text" value="その他" readonly />
                @endif
               </td>
              </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">メールアドレス</th>
              <td class="confirm-table__text">
                <input type="hidden" name="email" value="{{ $contact['email'] }}" />
                <input type="email" value="{{ $contact['email'] }}" readonly />
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">電話番号</th>
              <td class="confirm-table__text">
                <input type="hidden" name="tel1" value="{{ $contact['tel1'] }}" />
                <input type="hidden" name="tel2" value="{{ $contact['tel2'] }}" />
                <input type="hidden" name="tel3" value="{{ $contact['tel3'] }}" />
                <input type="tel" value="{{ $contact['tel1'] }}-{{ $contact['tel2'] }}-{{ $contact['tel3'] }}" readonly />
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">住所</th>
              <td class="confirm-table__text">
                <input type="hidden" name="address" value="{{ $contact['address'] }}" />
                <input type="text" value="{{ $contact['address'] }}" readonly />
              </td>
            </tr>
             <tr class="confirm-table__row">
              <th class="confirm-table__header">建物名</th>
              <td class="confirm-table__text">
                <input type="hidden" name="building" value="{{ $contact['building'] }}" />
                <input type="text" value="{{ $contact['building'] }}" readonly />
              </td>
            </tr>
             </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">お問い合わせの種類</th>
              <td class="confirm-table__text">
                <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}" />
                <input type="text" value="{{ $contact['category_name'] }}" readonly />
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">お問い合わせ内容</th>
              <td class="confirm-table__text">
                <input type="hidden" name="content" value="{{ $contact['content'] }}" />
                <input type="text" value="{{ $contact['content'] }}" readonly />
              </td>
            </tr>
          </table>
        </div>
        <div class="form__button">
          <button class="form__button-submit" type="submit">送信</button>
        </div>
      </form>
    </div>
  </main>
</body>

</html>