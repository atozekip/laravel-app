<h1>アップロードファイル一覧</h1>

<p><a href="/upload">アップロード画面へ</a></p>

<ul>
@foreach ($files as $file)
    <li>
        {{ $file->original_name }}
        / {{ $file->path }}
        / {{ $file->size }} bytes

        <a href="{{ $file->url }}" target="_blank">
            ダウンロード
        </a>

    </li>
@endforeach
</ul>
