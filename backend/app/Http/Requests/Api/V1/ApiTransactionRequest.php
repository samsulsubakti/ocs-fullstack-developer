<?php

namespace App\Http\Requests\Api\V1;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ApiTransactionRequest extends FormRequest
{

  public function authorize()
  {

    return true;
  }

  public function rules()
  {
    return [
      "modul_id" => [
        "required",
      ],
      "amount" => [
        "required",
      ],
    ];
  }
}
