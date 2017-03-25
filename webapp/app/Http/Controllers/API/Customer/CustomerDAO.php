<?php

namespace App\Http\Controllers\API\Customer;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\DAO;
use App\Exceptions\DAOException;
use App;

use App\Models\Customer;

class CustomerDAO extends DAO
{
    public function __construct()
    {
      $this->model = new Customer();
      $this->tableName = 'customers';
      $this->className = 'CustomerDAO';
    }

    public function createCustomerId(){
      $latestCustomerId;
      $customers = $this->model->orderBy('id','desc')->get();
      if (isset($customers[0])) {
        // echo 'found !';
        $latestCustomerId = $customers[0]->customer_id + 1;
      } else {
        // echo 'not found !'; 
        $latestCustomerId = 1;
      }
      return $latestCustomerId;
    }

    public function readByCerId($id, $idType){
      return $this->model->where('id_number',$id)->where('id_type',$idType)->first();
    }

    public function searchByIdNumber($idNumber) {
      try {
        $r = $this->model->where('id_number',$idNumber)->first();
        if (is_null($r)) {
          throw new DAOException('id_number = '. $idNumber .' was not found',500);
        }
      } catch (\Illuminate\Database\QueryException $e) {
        throw new DAOException('id_number = '. $idNumber .' was not found',500);
      } catch (PDOException $e) {
        throw new PDOException($e->getMessage());
      }
      return $r;
    }

    public function searchByName($firstname, $lastname) {
      try {
        $r = $this->model->where('firstname',$firstname)->where('lastname',$lastname)->first();
        if (is_null($r)) {
          throw new DAOException('customer name = '. $firstname.' '.$lastname.' was not found',500);
        }
      } catch (\Illuminate\Database\QueryException $e) {
        throw new DAOException('customer name = '. $firstname.' '.$lastname.' was not found',500);
      } catch (PDOException $e) {
        throw new PDOException($e->getMessage());
      }
      return $r;
    }
}
