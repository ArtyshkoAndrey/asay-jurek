<?php

namespace App\Helpers;

class JsonResponse
{
  public static function success(array $data): \Illuminate\Http\JsonResponse
  {
    return response()->json(['payload' => $data, 'status' => 'success', 'success' => true]);
  }
}