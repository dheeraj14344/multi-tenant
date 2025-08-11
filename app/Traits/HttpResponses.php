<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait HttpResponses
{
    protected function ok(string $message, $statusCode = 200): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'statusCode' => (string)$statusCode,
        ], $statusCode);
    }

    /**
     * Return a JSON response with a success message.
     *
     * @param string $message
     * @return JsonResponse
     */
    public function successResponse($data, string $message, int $statusCode = 200): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'statusCode' => (string)$statusCode,
            'data' => $data
        ], $statusCode);
    }

    /**
     * Return a JSON response with an error message.
     *
     * @param string $message
     * @param int $statusCode
     * @return JsonResponse
     */
    public function errorResponse(string $message, int $statusCode = 400): JsonResponse
    {
        return response()->json([
            'status' => 'Error has occurred...',
            'message' => $message,
        ], $statusCode);
    }
}
