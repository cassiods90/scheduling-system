<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadedFile extends Model
{
    protected $fillable = [
        'filename',
        'original_filename',
        'path',
        'is_temp',
        'size',
    ];

    protected $appends = [
        'url'
    ];

    public function getUrlAttribute($value)
    {
        return \Storage::disk('s3')->url("{$this->path}/{$this->filename}");
    }
}
