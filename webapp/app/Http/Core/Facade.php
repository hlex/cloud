<?php

namespace App\Http\Core;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use DateTime;

class Facade extends Controller {
  /*
  |--------------------------------------------------------------------------
  | Default Facade
  |--------------------------------------------------------------------------
  | - Validation
  | - Detect Gateway Problem (3XX,4XX,5XX)
  | - Request, Response format
  |
  |
  |
  |
  */

  public $processor;
  public $rules;
  public $messsages;
  public $validators;
  public $exceptors;

  public function __construct(){

  }

  public function toProcessor() {

  }

  public function toEndUser($response) {
    return [
        'status' => 'SUCCESSFUL',
        'trx-id' => hash('md5',time()),
        'response-data' => $response,
        'process-instance' => 'tmsapnpr1 (instance: Forvizdev)',
    ];
  }

  public function facadeValidate($validator, $data) {
    // print_r($validator);
    // die;
    return $validationResult = $validator->apiValidate($data);
  }

  public function isValid($data) {
    // $validationResult = $this->validator->apiValidate([
    //     'user_id' => '1234',
    //     'order' => [
    //       'sale_agent' => 'test',
    //     ],
    // ]);
    $validationResult = $this->validator->apiValidate($data);
    if ($validationResult['result'] === 'PASSED') {
        # go to processor
        return '';
    } else {
        # reject throw exception
        # set exception
        $this->exceptor->setException($validationResult['code'], $validationResult['response']);
        return $validationResult['response'];
    }
  }
}
