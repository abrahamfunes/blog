<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UsersRoles
 * @package App\Models
 * @version July 23, 2017, 9:55 pm UTC
 */
class UsersRoles extends Model
{
    #use SoftDeletes;

    public $table = 'users_roles';
    
    #const CREATED_AT = 'created_at';
    #const UPDATED_AT = 'updated_at';


    #protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'role_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'role_id' => 'integer'
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
    public function role()
    {
        return $this->belongsTo(\App\Models\Role::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
