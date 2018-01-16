<?php
/**
 * Created by PhpStorm.
 * User: kyle
 * Date: 11/12/17
 * Time: 14:56
 */

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function evenements()
    {
        return $this->hasMany(Evenement::class);
    }

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
}
