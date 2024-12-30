<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class NeedApprovalResource extends JsonResource
{

  public function toArray(Request $request): array
  {

    return [
      'id' => $this->id,
      'modul_id' => $this->modul_id,
      'transaction_id' => $this->transaction_id,
      'nik' => $this->nik,
      'name' => $this->name,
      'email' => $this->email,
      'position' => $this->position,
      'level' => $this->level,
      "transaction" => new TransactionResource($this->whenLoaded("transaction")),
      "workflowApproval" => new WorkflowApprovalResource($this->whenLoaded("workflowApproval")),
    ];
  }
}
