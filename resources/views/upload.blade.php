<h1>S3アップロード</h1>

@if (session('message'))
    <p style="color: green;">{{ session('message') }}</p>
@endif

<form method="POST" action="/upload" enctype="multipart/form-data">
    @csrf

    <input type="file" name="file">

    <button type="submit">アップロード</button>
</form>
