<?php

namespace App\Exceptions;
use Exception;

class ValidationException extends BaseException {
  
  public function __construct($message, $httpErrorCode, $technicalError = '') {
    parent::__construct($message, $httpErrorCode, $technicalError);
  }
}
