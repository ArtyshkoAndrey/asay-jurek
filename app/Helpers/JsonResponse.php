<?php

namespace App\Helpers;

class JsonResponse
{
  public static function success(array $data): \Illuminate\Http\JsonResponse
  {
    return response()
      ->json([
        'payload' => $data,
        'status' => 'success',
        'success' => true
      ]);
  }

  public static function error(array $array, int $status = 500): \Illuminate\Http\JsonResponse
  {
    return response()
      ->json([
        'payload' => $array,
        'status' => 'error',
        'success' => false
      ], $status);
  }
}