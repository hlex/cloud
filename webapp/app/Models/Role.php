<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
    protected $fillable = [
      'role_name', 'role_level',
    ];

    protected $table = 'roles';

    public function getUsers() {
      return $this->belongsToMany('App\User');
    }
}
