<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterConfigReference extends Model {
  //
  protected $fillable = [
    'DICT_ID',
    'title',
    'description',
  ];

  protected $table = 'md_dictionary';
}
