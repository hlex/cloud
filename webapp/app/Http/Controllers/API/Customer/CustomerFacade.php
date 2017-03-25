<?php

namespace App\Http\Controllers\API\Customer;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Facade;
use App\Http\Controllers\Validator;
use App\Http\Controllers\API\Customer\CustomerProcessor;
use App;

class CustomerFacade extends Facade
{
    public function __construct()
    {
      $this->className = 'CustomerFacade';
      $this->processor = new CustomerProcessor();
      
      # declare rules
      $this->rules = [
        'getCustomerProfile' => [
          'id_number' => 'required_without_all:firstname,lastname',
          'firstname' => 'required',
          'lastname' => 'required_with:firstname',
        ],
      ];

      # declare messages
      $this->messages = [
        'getCustomerProfile' => [
          'id_number.in' => 'id-number could not be empty',
          'firstname.required' => 'firstname could not be empty',
          'lastname.required' => 'lastname could not be empty',
        ],
      ];

      # more rules https://laravel.com/docs/5.2/validation#validating-arrays
      $this->validators = [
        'getCustomerProfile' => new Validator($this->rules['getCustomerProfile'], $this->messages['getCustomerProfile']),
      ];
    }

     public function getCustomers(Request $request) {
      # validate 
      return $this->toEndUser($this->processor->gettingCustomers());
    }

    public function getCustomerProfile(Request $request) {
      # validate 
      $this->facadeValidate($this->validators['getCustomerProfile'], $request->all());


      $firstname = null;
      $lastname = null;
      $idNumber = null;

      if ($request->has('firstname')) $firstname = $request->get('firstname');
      if ($request->has('lastname')) $lastname = $request->get('lastname');
      if ($request->has('id_number')) $idNumber = $request->get('id_number');

      return $this->toEndUser($this->processor->searchingCustomer($firstname,$lastname,$idNumber));
    }
}
