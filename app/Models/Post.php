<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Post
 * @package App\Models
 * @version September 4, 2017, 4:26 pm UTC
 *
 * @property \App\Models\User user
 * @property \App\Models\Category category
 * @property \App\Models\File file
 * @property \Illuminate\Database\Eloquent\Collection Comment
 * @property \Illuminate\Database\Eloquent\Collection usersRoles
 * @property string title
 * @property string title_slug
 * @property integer author_id
 * @property integer category_id
 * @property integer thumbnail_id
 * @property string content
 * @property integer status_id
 */
class Post extends Model
{

    public $table = 'posts';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'title',
        'title_slug',
        'author_id',
        'category_id',
        'thumbnail_id',
        'content',
        'status_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'title_slug' => 'string',
        'author_id' => 'integer',
        'category_id' => 'integer',
        'thumbnail_id' => 'integer',
        'content' => 'string',
        'status_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|unique:posts|max:240',

    ];

    public static $rulesUpdate = [
        'title' => 'required|max:240',

    ];

    public static $niceNames = [
        'folio' => 'Titulo',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'author_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function file()
    {
        return $this->hasOne(\App\Models\File::class, 'reference_id')->whereStatusId(1);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function comments()
    {
        return $this->hasMany(\App\Models\Comment::class)->whereStatusId(1)->whereFatherCommentId(null);
    }
}
