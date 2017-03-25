<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterConfig extends Model {
  //
  protected $fillable = [
    'DICT_ID',
    'WORD',
    'VALUE',
    'in_desc',
    'th_desc',
    'en_desc',
    'name1',
    'value1',
    'name2',
    'value2',
    'name3',
    'value3',
    'name4',
    'value4',
    'name5',
    'value5',
  ];

  protected $table = 'md_entry';
}
