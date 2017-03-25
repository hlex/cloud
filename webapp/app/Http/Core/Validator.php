<?php

namespace App\Http\Core;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Exceptions\ValidationException;
use App;

class Validator extends Controller{

  /*
  |--------------------------------------------------------------------------
  | Default Validator
  |--------------------------------------------------------------------------
  | - Manage Data Validation
  */
  public $messages;
  public $rules;

  public function __construct($rules,$messages) {
      $this->rules = $rules;
      $this->messages = $messages;
  }

  public function apiValidate($data) {

      # ajax request
      # for more error code inf. http://developers.gigya.com/display/GD/Response+Codes+and+Errors+REST
      $validator = \Validator::make($data, $this->rules, $this->messages);

      # if fails throw
      if ($validator->fails()) {
          $firstErrorMessage = $validator->errors()->first();
          // echo $firstErrorMessage;
          $callerName = '';
          $trace = debug_backtrace();
            if (isset($trace[1])) {
              // $trace[0] is ourself
              // $trace[1] is our caller
              // and so on...
              // echo $trace[1]['object']['className']->className;
              // echo "called by {$trace[1]['className']} :: {$trace[1]['function']}";
              // $name = var_dump($trace[1]['object']->className);
              // echo var_dump($trace[1]['object']->className).' '.$firstErrorMessage;
              $callerName = $trace[1]['object']->className;
            }
          throw new ValidationException($firstErrorMessage,500,$callerName.' '.$firstErrorMessage);
      }
  }

  public function requestValidate(Request $request,$redirect) {
      // # internal request
      $validator = \Validator::make($request->all(), $this->rules, $this->messages);
      $response = '';
      $result = '';
      $errorCode = '';
      if ($validator->fails()) {
          $response = redirect($redirect)->withErrors($validator)->withInput();
          $errorCode = '500';
          $result = 'FAILED';
      } else {
          $result = 'PASSED';
      }
      return [
          'response' => $response,
          'result' => $result,
          'code' => $errorCode
      ];
  }
}
