<?php

namespace App\Http\Controllers\API\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Facade;
use App\Http\Controllers\API\User\UserProcessor;
use App;

class UserFacade extends Facade
{
    public function __construct()
    {
      $this->className = 'UserFacade';
      $this->processor = new UserProcessor();
    }
}
