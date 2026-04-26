<h1>ユーザー登録</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li style="color:red;">{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="/users">
    @csrf

    <div>
        <label>名前</label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name')
            <div style="color:red;">{{ $message }}
        @enderror
    </div>

    <div>
        <label>メール</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email')
            <div style="color:red;">{{ $message }}
        @enderror
    </div>

    <button type="submit">登録</button>
</form>
