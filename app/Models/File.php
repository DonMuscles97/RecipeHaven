<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    use SoftDeletes;

    public $table = 'files';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'object_type',
        'object_id',
        'path',
        'file_name',
        'file_type',
        'description',
        'created_by',
        'filesize'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'object_type' => 'string',
        'path' => 'string',
        'file_name' => 'string',
        'file_type' => 'string',
        'description' => 'string',
        'created_by' => 'integer',
        'filesize' => 'integer'
    ];
}
