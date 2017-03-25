<?php

namespace App\Http\Core;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;

class Processor extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Default Processor
    |--------------------------------------------------------------------------
    | - Businees Logic
    | - Call DAO for query
    */
    public $className;
    public $DAO;
    public $masterConfigProcessor;
    public $validators;
    public $rules;
    public $messages;

    public function __construct() {
      $this->masterConfigProcessor = new MasterConfigProcessor();
    }

    public function processorValidate($validator, $data) {
      return $validationResult = $validator->apiValidate($data);
    }
}
