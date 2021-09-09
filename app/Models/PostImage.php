<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_name',
        'file_type',
        'path',
        'file_number', 
        'user_id'
    ];

    public function post()
        {
            return $this->belongsTo(Post::class);
        }
}
