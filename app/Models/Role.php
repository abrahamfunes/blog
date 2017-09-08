<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Role extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users_role()
    {
        return $this->hasMany(UsersRole::class);
    }

}
