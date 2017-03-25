<?php

namespace App\Http\Controllers\API\Customer;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Processor;
use App\Http\Controllers\Validator;
use App\Http\Controllers\API\Customer\CustomerDAO;

use App;

class CustomerProcessor extends Processor
{
    private $evaluator;

    public function __construct()
    {
      $this->className = 'CustomerProcessor';
      $this->DAO = new CustomerDAO();

      $this->rules = [
        'submitOrder' => [
          // 'title_code' => 'required',
          // 'title' => 'required',
          // 'gender' => 'required',
          'firstname' => 'required',
          'lastname' => 'required',
          // 'birthdate' => 'required',
          // 'customer_type' => 'required',
          // "contact_number" => 'required',
          "contact_mobile_number" => 'required',
          // "contact_email" => 'required',
          // "language" => 'required',
          // "id_type" => 'required',
          // "id_number" => 'required',
          // "id_expire_date" => 'required',
          // "customer_id" => 'required',
          // "customer_level" => 'required',
        ],
      ];

      $this->messages = [
        'submitOrder' => [
          // 'title_code.required' => 'title_code could not be empty',
          // 'title.required' => 'title could not be empty',
          // 'gender.required' => 'gender could not be empty',
          'firstname.required' => 'firstname could not be empty',
          'lastname.required' => 'lastname could not be empty',
          // 'birthdate.required' => 'birthdate could not be empty',
          // 'customer_type.required' => 'customer_type could not be empty',
          // 'contact_number.required' => 'contact_number could not be empty',
          'contact_mobile_number.required' => 'contact_mobile_number could not be empty',
          // 'contact_email.required' => 'contact_email could not be empty',
          // 'language.required' => 'language could not be empty',
          // 'id_type.required' => 'id_type could not be empty',
          // 'id_number.required' => 'id_number could not be empty',
          // 'id_expire_date.required' => 'id_expire_date could not be empty',
          // 'customer_id.required' => 'customer_id could not be empty',
          // 'customer_level.required' => 'customer_level could not be empty',
          # don't forget to validate address in AddressProcessor !!!
        ],
      ];

      $this->validators = [
        'submitOrder' => new Validator($this->rules['submitOrder'], $this->messages['submitOrder']),
      ];
    }

    public function gettingCustomers() {
      return $this->DAO->read(null);
    }

    public function searchingCustomer($firstname, $lastname, $idNumber) {

      // echo $firstname;
      // echo $lastname;
      // echo $idNumber;

      $result = null;

      if ($idNumber != null) {
        $result = $this->DAO->searchByIdnumber($idNumber);
      } else {
        $result = $this->DAO->searchByName($firstname, $lastname);
      }
      
      return $result;
    }
}
