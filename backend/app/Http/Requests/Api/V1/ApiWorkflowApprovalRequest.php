<?php

namespace App\Http\Requests\Api\V1;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ApiWorkflowApprovalRequest extends FormRequest
{

  public function authorize()
  {

    return true;
  }

  public function rules()
  {
    return [
      "name" => [
        "nullable",
      ],
      "modul" => [
        "required",
      ],
      "email" => [
        "nullable",
      ],
      "position" => [
        "nullable",
      ],
      "nik" => [
        "nullable",
      ],
      "type" => [
        "required",
      ],
      "value" => [
        "nullable",
      ],
    ];
  }
}
