<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Role;
use App\Models\RoleUser;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = 'users';

    public function getRoles() {
      return $this->belongsToMany('App\Models\Role');
    }

    public function hasRole($roleName) {
      $role = Role::where('role_name', $roleName)->first();
      $users = $role->getUsers()->get();
      $usersWithRole = $users->filter(function($value, $key) {
        return $value['username'] == $this->username;
      });
      return count($usersWithRole) > 0;
    }
}
