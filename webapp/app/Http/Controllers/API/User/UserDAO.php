<?php

namespace App\Http\Controllers\API\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\DAO;
use App\Http\Controllers\Exceptor;
use App;

use App\Models\User;

class UserDAO extends DAO
{
    public function __construct()
    {
      $this->model = new User();
      $this->tableName = 'golds';
      $this->className = 'UserDAO';
      $this->exceptor = new Exceptor();
    }
}
