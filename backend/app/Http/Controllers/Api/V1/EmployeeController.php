<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\V1\Base\ApiUserRequest;
use App\Http\Resources\V1\EmployeeResource;
use App\Models\Employee;
use App\Services\BaseCrud\BaseCrud;

class EmployeeController extends BaseCrud
{

  public $model = Employee::class;
  public $resource = EmployeeResource::class;
  public $storeValidator = ApiUserRequest::class;
  public $updateValidator = ApiUserRequest::class;
  public $defaultOrder = "nik";
  public $modelKey = "nik";
  public $cacheInMinute = 10;
}
