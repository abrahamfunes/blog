<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Category
 * @package App\Models
 * @version September 4, 2017, 7:45 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection usersRoles
 * @property string name
 * @property integer status_id
 */
class Category extends Model
{

    public $table = 'categories';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'name',
        'status_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'status_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
