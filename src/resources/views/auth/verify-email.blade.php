<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
</head>
<body>
    <h1>メール認証</h1>
    <p>メールで送信したリンクをクリックして、メールアドレスを確認してください。メールが届かない場合は、喜んで別のメールをお送りいたします。</p>

    @if (session('status') == 'verification-link-sent')
        <p>メール確認リンクが、指定したメールアドレスに送信されました。</p>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit">確認メールを再送信</button>
    </form>
</body>
</html>
