<h1>ユーザー編集</h1>

<form method="POST" action="/users/{{ $user->id }}">
    @csrf
    @method('PUT')

    <div>
        <label>名前</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}">
        @error('name')
            <div style="color:red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label>メール</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}">
        @error('email')
            <div style="color:red;">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">更新</button>
</form>
