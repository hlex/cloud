<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  public function log($tag, $data) {
    echo 'log: '.$tag.PHP.EOL;
    echo "<pre>";
    print_r(json_encode($data));
  }

  public function debug($tag, $data) {
    echo 'debug: '.$tag.PHP.EOL;
    echo "<pre>";
    print_r(json_encode($data));
    die;
  }
}
