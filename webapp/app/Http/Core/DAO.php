<?php

namespace App\Http\Core;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;

use App\Exceptions\DAOException;

class DAO extends Controller
{

  /*
  |--------------------------------------------------------------------------
  | Default DAO
  |--------------------------------------------------------------------------
  |
  | - Call Database for Query script
  */

  public $model;
  public $tableName;

  public function __construct(){
  }

  public function readByKeyNotThrow($key, $data) {
    return $r = $this->model->where($key,$data)->first();
  }

  public function read($id){
      if ($id == null) return $this->model->all();
      try {
        $r = $this->model->where('id',$id)->first();
        if (is_null($r)) {
          throw new DAOException('id = '. $id .' was not found',500);
        }
      } catch (\Illuminate\Database\QueryException $e) {
        throw new DAOException($id.' was not found',500);
      } catch (PDOException $e) {
        throw new DAOException($id.' was not found',500);
      }
      return $r;
  }

  public function readMultipleByKey($key,$id){
    try {
      $r = $this->model->where($key,$id)->get();
      if (is_null($r)) {
        throw new DAOException($key.' = '.$id.' was not found',500);
      }
    } catch (\Illuminate\Database\QueryException $e) {
      throw new DAOException($key.' = '.$id.' was not found',500);
    } catch (PDOException $e) {
      throw new DAOException($key.' = '.$id.' was not found',500);
    }
    return $r;
  }

  public function readPrimaryDataByKey($key,$id){
    $r = $this->readByKey($key, $id);
    return $this->DAOFactory($r);
  }

  public function readByKey($key,$id){
      // echo $key.' '.$id;
      try {
          $r = $this->model->where($key,$id)->first();
          if (is_null($r)) {
            throw new DAOException($key.' = '.$id.' was not found',500);
          }
      } catch (\Illuminate\Database\QueryException $e) {
          throw new DAOException($key.' = '.$id.' was not found',500);
      } catch (PDOException $e) {
          throw new DAOException($key.' = '.$id.' was not found',500);
      }
      return $r;
  }

  public function readLatestByKey($key,$id){
      // echo $key.' '.$id;
      try {
          $r = $this->model->orderBy('id', 'DESC')->where($key,$id)->first();
          if (is_null($r)) {
            throw new DAOException($key.' = '.$id.' was not found',500);
          }
      } catch (\Illuminate\Database\QueryException $e) {
          throw new DAOException($key.' = '.$id.' was not found',500);
      } catch (PDOException $e) {
          throw new DAOException($key.' = '.$id.' was not found',500);
      }
      return $r;
  }

  public function readPrimaryDataMultipleByKey($key, $id){
    try {
      $r = \DB::table($this->tableName)->where($key, $id)->get();
      if (is_null($r)) {
        throw new DAOException($key.' = '.$id.' was not found',500);
      }
    } catch (\Illuminate\Database\QueryException $e) {
      throw new QueryException($e->getMessage());
    } catch (PDOException $e) {
      throw new PDOException($e->getMessage());
    }

    return $this->DAOFactory($r);
  }

  public function DAOFactory($entries){

    $result = [];
    foreach($entries as $entry){
      $tuple = [
        'primary_order_data' => [],
      ];
      foreach ($entry as $key => $value) {
        $attrKey;
        // echo $key.$value;
        switch ($key) {
          case 'name1':
          case 'name2':
          case 'name3':
          case 'name4':
          case 'name5':
          case 'name6':
          case 'name7':
          case 'name8':
          case 'name9':
          case 'name10':
            if ($value != ''){
              $tuple['primary_order_data'][$value] = '';
              $attrKey = $value;
            }
            break;
          case 'value1':
          case 'value2':
          case 'value3':
          case 'value4':
          case 'value5':
          case 'value6':
          case 'value7':
          case 'value8':
          case 'value9':
          case 'value10':
            if ($value != ''){
              $tuple['primary_order_data'][$attrKey] = $value;
            }
            break;
          default:
            $tuple[$key] = $value;
            break;
        }
      }
      array_push($result,$tuple);
    }
    // die;
    return $result;
  }

  public function update($id,$data){
      try {
          $target = $this->read($id);
          return $target->update($data);
      } catch (\Illuminate\Database\QueryException $e) {
          return new DAOException('update id = '.$id.' '.$data.' could not be update' ,500);
      } catch (PDOException $e) {
          return new DAOException('update id = '.$id.' '.$data.' could not be update' ,500);
      }
  }

  public function updateByKey($key,$id,$data){
      try {
          $target = $this->readByKey($key,$id);
          $target->update($data);
          return $target;
      } catch (\Illuminate\Database\QueryException $e) {
          return new DAOException('updateByKey '.$key.' = '.$id.' '.$data.' could not be update' ,500);
      } catch (PDOException $e) {
          return new DAOException('updateByKey '.$key.' = '.$id.' '.$data.' could not be update' ,500);
      }
  }

  public function updateLatestByKey($key, $id, $data) {
      try {
          $target = $this->readLatestByKey($key,$id);
          $target->update($data);
          return $target;
      } catch (\Illuminate\Database\QueryException $e) {
          return new DAOException('updateByKey '.$key.' = '.$id.' '.$data.' could not be update' ,500);
      } catch (PDOException $e) {
          return new DAOException('updateByKey '.$key.' = '.$id.' '.$data.' could not be update' ,500);
      }
  }
  
  public function create($data) {

      // echo "<pre>";
      // print_r($data);
      // die;
      # solution catch query exception => http://stackoverflow.com/questions/26363271/laravel-check-for-constraint-violation
      try {
          $target = $this->model->create($data);
          return $target;
      } catch (\Illuminate\Database\QueryException $e) {
          return new DAOException('DAO create error',500);
      } catch (PDOException $e) {
          return new DAOException('DAO create error',500);
      }
  }

  public function delete($id) {
      try {
          $target = $this->read($id);
          $target->delete();
          return $target;
      } catch (\Illuminate\Database\QueryException $e) {
          return new DAOException($id.' could not be delete' ,500);
      } catch (PDOException $e) {
          return new DAOException($id.' could not be delte', 500);
      }
  }
}
