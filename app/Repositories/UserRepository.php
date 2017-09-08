<?php

namespace App\Repositories;

use App\Models\User;
use InfyOm\Generator\Common\BaseRepository;

class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'name',
        'email',
        'password',
        'created_at',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }
}
