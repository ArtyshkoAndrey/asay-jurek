<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use App\Helpers\JsonResponse;

class JsonErrorException extends Exception
{
  public function render(Request $request): \Illuminate\Http\JsonResponse
  {

    return JsonResponse::error([
      'message' => $this->message
    ], 501);
  }
}
