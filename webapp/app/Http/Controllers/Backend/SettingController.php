<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;

class SettingController extends BackendBaseController {

  public $folder;
  public $title;
  public $model;

  public function __construct() {
    $this->folder = 'setting';
    $this->title = 'setting';
  }
}
