<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','warehouse_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles', 'user_id', 'role_id');
    }

    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole($role)
    {
        return ($this->roles()->where('name', $role)->first() != null);
    }

    public function profile()
    {
        return (Role::join('users_roles', 'users_roles.role_id', '=', 'roles.id')->where(['users_roles.user_id' => $this->id])->first());
        #return $this->belongsTo(UsersRoles::where(['user_id' => $this->id])->first());
        #return $this->belongsToMany(UsersRoles::class,'users_roles as profile', 'user_id', ($this->id));
    }
}
