<?php

namespace App\Http\Services;

use Illuminate\Http\JsonResponse;

class ResponseService
{
    public static function success(
        string $message = "Success",
        mixed $data = null,
        int $status = 200
    ): JsonResponse {
        return response()->json([
            "success" => true,
            "message" => $message,
            "data" => $data
        ], $status);
    }

    public static function error(
        string $message = "Error",
        mixed $data = null,
        int $status = 400
    ): JsonResponse {
        return response()->json([
            "success" => false,
            "message" => $message,
            "data" => $data
        ], $status);
    }

    public static function notFound(
        string $message = "Resource not found"
    ): JsonResponse {
        return response()->json([
            "success" => false,
            "message" => $message
        ], 404);
    }

    public static function validationError($errors): JsonResponse
    {
        return response()->json([
            "success" => false,
            "message" => "Validation error",
            "errors" => $errors
        ], 422);
    }
}