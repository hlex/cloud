<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;

use App\User;
use App\Models\Role;
class UserController extends BackendBaseController {

  public $folder;
  public $title;
  public $model;

  public function __construct() {
    $this->folder = 'user';
    $this->title = 'user';
    $this->model = new User();
  }

  public function index() {
    $this->props['items'] = $this->model->with('getRoles')->get();
    return parent::index();
  }

  public function edit($id) {
    $roles = Role::all();
    $this->props['roles'] = $roles->map(function($role) {
      return [
        'label' => $role->role_name,
        'value' => $role->id,
      ];
    });
    return parent::edit($id);
  }
}
