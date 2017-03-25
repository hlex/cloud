<?php

namespace App\Http\Controllers\API\Master;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Core\Facade;
use App\Http\Core\Validator;
use App;

class MasterConfigFacade extends Facade
{
  public function __construct()
  {
    $this->className = 'MasterConfigFacade';
    $this->processor = new MasterConfigProcessor();

    # declare rules
    $this->rules = [
      'getMasterConfig' => [
        'config_key' => 'required',
        'branch_id' => 'required',
      ],
    ];

    # declare messages
    $this->messages = [
      'getMasterConfig' => [
        'config_key.required' => 'config_key could not be empty',
        'branch_id' => 'branch_id could not be empty',
      ],
    ];

    # more rules https://laravel.com/docs/5.2/validation#validating-arrays
    $this->validators = [
      'getMasterConfig' => new Validator($this->rules['getMasterConfig'], $this->messages['getMasterConfig']),
    ];
  }

  public function getMasterConfig(Request $request){
    # validate($validator, $data)
    $this->facadeValidate($this->validators['getMasterConfig'], $request->all());
    $dictId = $request->all()['config_key'];
    $branch_id = $request->all()['branch_id'];
    return $this->toEndUser($this->processor->gettingMasterList($dictId, $branch_id));
  }
}
