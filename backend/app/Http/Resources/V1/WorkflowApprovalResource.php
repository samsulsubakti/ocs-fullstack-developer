<?php

namespace App\Http\Resources\V1;

use App\Http\Resources\V1\Base\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class WorkflowApprovalResource extends JsonResource
{

  public function toArray(Request $request): array
  {

    return [
      'id' => $this->id,
      'modul' => $this->modul,
      'type' => $this->type,
      'nik' => $this->nik,
      'name' => $this->name,
      'email' => $this->email,
      'position' => $this->position,
      'value' => $this->value,
      // "user" => new UserResource($this->whenLoaded("user")),
    ];
  }
}
