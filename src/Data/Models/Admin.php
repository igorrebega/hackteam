<?php

namespace App\Data\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Admin
 * @package App\Data\Models
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * @var string
     */
    protected $table = 'admins';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
