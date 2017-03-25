<?php

namespace App\Http\Controllers\API\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Processor;
use App\Http\Controllers\Validator;
use App\Http\Controllers\Exceptor;
use App\Http\Controllers\API\User\UserDAO;

use App;

class UserProcessor extends Processor
{
    public function __construct()
    {
      $this->className = 'UserProcessor';
      $this->DAO = new UserDAO();

      $this->rules = [
        'submitOrder' => [
          'sale_id' => 'required',
          'sale_name' => 'required',
          'branch_id' => 'required',
          'branch_name' => 'required',
        ],
      ];

      $this->messages = [
        'submitOrder' => [
          'sale_id.required' => 'sale_id could not be empty',
          'sale_name.required' => 'sale_name could not be empty',
          'branch_id.required' => 'branch_id could not be empty',
          'branch_name.required' => 'branch_name could not be empty',
        ],
      ];

      $this->validators = [
        'submitOrder' => new Validator($this->rules['submitOrder'], $this->messages['submitOrder']),
      ];
    }
}
