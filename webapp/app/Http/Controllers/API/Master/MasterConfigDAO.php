<?php

namespace App\Http\Controllers\API\Master;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Core\DAO;
use App;
use App\Exceptions\DAOException;
use App\Models\MasterConfig;
use App\Models\MasterConfigReference;

class MasterConfigDAO extends DAO {
  public function __construct() {
    $this->md_dict = new MasterConfigReference();
    $this->model = new MasterConfig();
    $this->tableName = 'md_entry';
    $this->className = 'MasterConfigDAO';
  }

  public function getByDictId($dictId){
    if (is_null($this->md_dict->where('DICT_ID', $dictId)->first())) throw new DAOException('masterconfig key '. $dictId. ' was not found', 500);
    return \DB::table($this->tableName)->where('DICT_ID',$dictId)->get();
  }

  public function getByDictIdAndBranch($dictId, $branchId){
    if (is_null($this->md_dict->where('DICT_ID', $dictId)->first())) throw new DAOException('masterconfig key '. $dictId. ' was not found', 500);
    $result = \DB::table($this->tableName)->where(function ($query) use ($dictId, $branchId){
      $query->where('DICT_ID', $branchId.'.'.$dictId);
    })->get();
    if (empty($result)) throw new DAOException('masterconfig key '. $dictId. ' at branch '. $branchId .' was not found', 500);
    return $result;
  }

  public function updateLatestUniqueId($dictId, $id){
    $config = \DB::table($this->tableName)->where('DICT_ID',$dictId)->update(['VALUE' => $id]);
  }

  public function updateByDictIdAndBranch($dictId, $id, $branchId) {
      // echo $dictId, $id, $branchId;
      // die;
    if (is_null($this->md_dict->where('DICT_ID', $dictId)->first())) throw new DAOException('masterconfig key '. $dictId. ' was not found', 500);
    $result = \DB::table($this->tableName)->where(function ($query) use ($dictId, $branchId){
      $query->where('DICT_ID', $branchId.'.'.$dictId);
    })->update(['VALUE' => $id]);
  ## depricated for validate before update key
  //   if (empty($result)) throw new DAOException('masterconfig key '. $dictId. ' at branch '. $branchId .' was not found', 500);
  //   $result[0]->update(['VALUE' => $id]);
    return $result;
  }
}
