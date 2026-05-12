<?php

namespace App\Http\Controllers;

use App\Models\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadFileController extends Controller
{
    public function index()
    {
        $files = UploadFile::latest()->get();

        foreach ($files as $file) {
            $file->url = Storage::disk('s3')->temporaryUrl(
                $file->path,
                now()->addMinutes(5),
                [
                    'ResponseContentDisposition' =>
                        'attachment; filename="' . $file->original_name . '"',
                ]
            );
        }

        return view('upload-files', compact('files'));
    }

    public function create()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => ['required', 'file', 'max:2048'],
        ]);

        $file = $request->file('file');

        $path = $file->store('uploads', 's3');

        UploadFile::create([
            'original_name' => $file->getClientOriginalName(),
            'path' => $path,
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
        ]);

        return redirect('/upload/files');
    }

    public function destroy(UploadFile $file)
    {
        Storage::disk('s3')->delete($file->path);

        $file->delete();

        return redirect('/upload/files');
    }
}
