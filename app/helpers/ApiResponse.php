<?php

namespace App\Helpers;

class ApiResponse
{
    public static function success($message = '', $data = null, $statusCode = 200)
    {
        return response()->json([
            'success'       => true,
            'statusCode'    => $statusCode,
            'message'       => $message,
            'data'          => $data
        ], $statusCode);
    }

    public static function error($message = '', $statusCode = 400, $data = null)
    {
        return response()->json([
            'success'       => false,
            'statusCode'    => $statusCode,
            'message'       => $message,
            'data'          => $data
        ], $statusCode);
    }
}