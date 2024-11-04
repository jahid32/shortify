<?php

namespace App\Traits;

trait ApiResponses
{
    protected function ok($message)
    {
        return $this->success($message, 200);
    }

    protected function success($message, $data = null, $statusCode = 200)
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
            'status' => $statusCode,
        ], $statusCode);
    }

    protected function error($message, $data, $statusCode)
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
            'status' => $statusCode,
        ], $statusCode, );
    }
}
