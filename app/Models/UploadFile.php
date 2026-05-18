<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UploadFile extends Model
{
    protected $fillable = [
        'user_id',
        'original_name',
        'path',
        'mime_type',
        'size',
    ];
}
