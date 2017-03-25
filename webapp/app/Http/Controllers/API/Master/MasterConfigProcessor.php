<?php

namespace App\Http\Controllers\API\Master;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Core\Processor;
use App;

class MasterConfigProcessor extends Processor {
  public function __construct() {
    $this->className = 'MasterConfigProcessor';
    $this->DAO = new MasterConfigDAO();
  }

  public function updatingLatestUniqueId($dictId, $id){
    $this->DAO->updateLatestUniqueId($dictId, $id);
  }

  public function updatingLatestUniqueIdByBranch($dictId, $id, $branchId = '8000000001'){
    $this->DAO->updateByDictIdAndBranch($dictId, $id, $branchId);
  }

  public function gettingLatestUniqueId($dictId){
    return $this->masterFactory($this->DAO->getByDictId($dictId));
  }

  public function gettingLatestUniqueIdByBranch($dictId, $branchId = '8000000001'){
    return $this->masterFactory($this->DAO->getByDictIdAndBranch($dictId, $branchId));
  }

  public function gettingMasterConfig($dictId, $branchId = '8000000001'){
    return $this->masterFactory($this->DAO->getByDictIdAndBranch($dictId, $branchId));
  }

  // # use this if it can generalize
  public function gettingMasterList($dictId, $branchId = '8000000001'){
    return $this->masterFactory($this->DAO->getByDictIdAndBranch($dictId, $branchId));
  }

  public function masterFactory($entries){
    $result = [];
    foreach($entries as $entry){
      $tuple = [
        'label' => '',
        'value' => '',
        'attributes' => [],
        'description' => '',
        'en-description' => '',
        'th-description' => '',
      ];
      foreach ($entry as $key => $value) {
        # code...
        // echo $key.$value;

        $attrKey;
        switch ($key) {
          case 'WORD':
            $tuple['label'] = $value;
            break;
          case 'VALUE':
            $tuple['value'] = $value;
            break;
          case 'in_desc':
            $tuple['description'] = $value;
            break;
          case 'th_desc':
            $tuple['th-description'] = $value;
            break;
          case 'en_desc':
            $tuple['en-description'] = $value;
            break;
          case 'name1':
          case 'name2':
          case 'name3':
          case 'name4':
          case 'name5':
            if ($value != ''){
              $tuple['attributes'][$value] = '';
              $attrKey = $value;
            }
            break;
          case 'value1':
          case 'value2':
          case 'value3':
          case 'value4':
          case 'value5':
            if ($value != ''){
              $tuple['attributes'][$attrKey] = $value;
            }
            break;
          default:
            # code...
            break;
        }
      }
      array_push($result,$tuple);
    }
    // die;
    return $result;
  }
}
