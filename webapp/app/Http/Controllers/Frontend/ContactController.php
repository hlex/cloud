<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;

class ContactController extends FrontendBaseController {

  public $folder;
  public $title;
  public $model;

  public function __construct() {
    $this->folder = 'contact';
    $this->title = 'contact';
  }
}
