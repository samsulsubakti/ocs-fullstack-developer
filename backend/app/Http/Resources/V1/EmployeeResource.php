<?php

namespace App\Http\Resources\V1;

use App\Http\Resources\V1\Base\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class EmployeeResource extends JsonResource
{

  public function toArray(Request $request): array
  {

    return [
      "nik" => $this->nik,
      "name" => $this->name,
      "email" => $this->email,
      "position" => $this->position,
      "user" => new UserResource($this->whenLoaded("user")),
      "needApprovals" => NeedApprovalResource::collection($this->whenLoaded("needApprovals")),
    ];
  }
}
