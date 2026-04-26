<h1>ユーザー一覧</h1>

<ul>
@foreach ($users as $user)
    <li>
        {{ $user->name }} ({{ $user->email }})

        <a href="/users/{{ $user->id }}/edit">編集</a>

        <form method="POST" action="/users/{{ $user->id }}" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">削除</button>
        </form>
    </li>
@endforeach
</ul>
