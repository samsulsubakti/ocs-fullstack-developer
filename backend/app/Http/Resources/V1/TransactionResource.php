<?php

namespace App\Http\Resources\V1;

use App\Http\Resources\V1\Base\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class TransactionResource extends JsonResource
{

  public function toArray(Request $request): array
  {

    return [
      'id' => $this->id,
      'modul_id' => $this->modul_id,
      'amount' => $this->amount,
      'createdBy' => $this->createdBy,
      "byCreated" => new EmployeeResource($this->whenLoaded("byCreated")),
      "workflowApproval" => new WorkflowApprovalResource($this->whenLoaded("workflowApproval")),
      "needApprovals" => NeedApprovalResource::collection($this->whenLoaded("needApprovals")),
    ];
  }
}
