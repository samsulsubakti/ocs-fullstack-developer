<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\V1\ApiTransactionRequest;
use App\Http\Resources\V1\TransactionResource;
use App\Models\NeedApproval;
use App\Models\Transaction;
use App\Services\BaseCrud\BaseCrud;
use Illuminate\Support\Facades\DB;

class TransactionController extends BaseCrud
{

  public $model = Transaction::class;
  public $resource = TransactionResource::class;
  public $storeValidator = ApiTransactionRequest::class;
  public $updateValidator = ApiTransactionRequest::class;
  public $defaultOrder = "id";
  public $modelKey = "id";
  public $cacheInMinute = 10;

  public function __prepareDataStore($data)
  {
    $data['createdBy'] = auth()->user()->employee->nik;
    return $data;
  }

  public function __afterStore()
  {
    $data = $this->row;
    // CALL InsertNeedApproval(10, 3, 5000000, '5315031911150003'); module_id, transaction_id, amount, nik
    DB::statement('CALL InsertNeedApproval(?, ?, ?, ?)', [$data->modul_id, $data->id, $data->amount, $data->createdBy]);
  }

  public function __prepareDataUpdate($data)
  {
    return $this->__prepareDataStore($data);
  }

  public function __afterUpdate()
  {
    $this->row->needApprovals->each->delete();
    $this->__afterStore();
  }

  public function __beforeDestroy()
  {
    $this->row->needApprovals->each->delete();
  }
}

