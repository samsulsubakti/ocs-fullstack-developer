<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\V1\ApiWorkflowApprovalRequest;
use App\Http\Resources\V1\WorkflowApprovalResource;
use App\Models\WorkflowApproval;
use App\Services\BaseCrud\BaseCrud;

class WorkflowApprovalController extends BaseCrud
{

  public $model = WorkflowApproval::class;
  public $resource = WorkflowApprovalResource::class;
  public $storeValidator = ApiWorkflowApprovalRequest::class;
  public $updateValidator = ApiWorkflowApprovalRequest::class;
  public $defaultOrder = "id";
  public $modelKey = "id";
  public $cacheInMinute = 10;
}
