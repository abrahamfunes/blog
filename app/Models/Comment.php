<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Comment
 * @package App\Models
 * @version September 4, 2017, 4:27 pm UTC
 *
 * @property \App\Models\Post post
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection usersRoles
 * @property integer post_id
 * @property integer user_id
 * @property string content
 * @property string name
 * @property string email
 * @property string website
 * @property integer status_id
 */
class Comment extends Model
{

    public $table = 'comments';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'post_id',
        'user_id',
        'father_comment_id',
        'content',
        'name',
        'email',
        'website',
        'status_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'post_id' => 'integer',
        'user_id' => 'integer',
        'content' => 'string',
        'name' => 'string',
        'email' => 'string',
        'website' => 'string',
        'status_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function post()
    {
        return $this->belongsTo(\App\Models\Post::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
