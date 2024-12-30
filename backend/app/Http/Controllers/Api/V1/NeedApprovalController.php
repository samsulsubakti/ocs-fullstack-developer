<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\V1\Base\ApiUserRequest;
use App\Http\Resources\V1\NeedApprovalResource;
use App\Models\NeedApproval;
use App\Services\BaseCrud\BaseCrud;

class NeedApprovalController extends BaseCrud
{

  public $model = NeedApproval::class;
  public $resource = NeedApprovalResource::class;
  public $storeValidator = ApiUserRequest::class;
  public $updateValidator = ApiUserRequest::class;
  public $defaultOrder = "id";
  public $modelKey = "id";
  public $cacheInMinute = 10;
}
