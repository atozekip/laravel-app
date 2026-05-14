<h1>ログイン</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li style="color:red;">{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="/login">
    @csrf

    <div>
        <label>メール</label>
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        <label>パスワード</label>
        <input type="password" name="password">
    </div>

    <button type="submit">ログイン</button>
</form>
