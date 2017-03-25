<?php

namespace App\Exceptions;
use Exception;

class BaseException extends Exception {

  # tips for create custom exception https://laraveltips.wordpress.com/category/handling-exceptions-and-custom-exceptions-laravel-5-1/
  # exception php http://php.net/manual/en/class.exception.php

  public function __construct($message, $httpErrorCode, $technicalError = '') {

      parent::__construct($message, $httpErrorCode);
      $this->message = $message;
      $this->messages = [
        'th' => '-',
        'en' => $message,
        'technical' => $technicalError,
      ];
      $this->technicalErrorCode = $this->setErrorCode();
  }

  public function getClass(){
    # get className
    $c = basename(str_replace('\\', '/', get_class($this)));
    return $c;
  }

  # https://www.ietf.org/rfc/rfc2616.txt
  public function setErrorCode() {
    $code = 'XXXXXX';
    switch ($this->message) {
      case (stripos($this->message,'could not be empty') !== false) || (stripos($this->message,'is required') !== false):
        # code...
        $code = 400002;
        break;
      case (stripos($this->message,'should be one of') !== false):
        # code...
        $code = 400005;
        break;
      default:
        # code...
        break;
    }
    // echo $code;
    return $code;
  }

  # raad more http://developers.gigya.com/display/GD/Response+Codes+and+Errors+REST
  public function getTechnicalErrorMessage() {
    $r = '';
    switch ($this->technicalErrorCode) {
      case 400001: $r = 'Invalid request format';
        break;
      case 400002: $r = 'Missing required parameter';
        break;
      case 400003: $r = 'Unique identifier exists';
        break;
      case 400004: $r = 'Invalid parameter format';
        break;
      case 400005: $r = 'Invalid parameter value';
        break;
      case 400006: $r = 'Duplicate value';
        break;
      default:
        # code...
        break;
    }
    return $r;
  }
  public function getHttpError() {
    # more status code http://stackoverflow.com/questions/942951/rest-api-error-return-good-practices
    # http://www.restapitutorial.com/httpstatuscodes.html
    $r = '';
    switch ($this->getCode()) {
      case 500: $r = 'Internal Server Error';
        break;
      case 501: $r = 'Not Implemented';
        break;
      case 502: $r = 'Bad Gateway';
        break;
      case 503: $r = 'Service Unavailable';
        break;
      case 504: $r = 'Gateway Timeout';
        # code...
        break;
      default:
        # code...
        break;
    }
    return $r;
  }
}
