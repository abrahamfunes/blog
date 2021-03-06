<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;

/**
 * Class File
 */
class File extends BaseModel
{
    protected $table = 'files';

    public $timestamps = false;

    protected $fillable = [
        'reference_id',
        'reference_type',
        'category_id',
        'filename',
        'filesize',
        'filetype',
        'path',
        'description',
        'content',
        'status_id'
    ];

    protected $guarded = [];

    public function rules()
    {
        return [
            //
        ];
    }


    public function category()
    {
        return $this->belongsTo(FilesCategory::class);
    }
        
}