<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

/**
 * Ý nghĩa:
 *      Controller nhận các yêu cầu (request) từ người dùng thông qua route.
 *      Chỉ đạo request đến đúng Service hoặc Repository để xử lý.
 *      Trả về phản hồi (response) dưới dạng HTML, JSON, hoặc API.
 * Chức năng chính:
 *      Xử lý request từ người dùng.
 *      Gọi các phương thức từ Service hoặc Repository.
 *      Trả về dữ liệu hoặc giao diện cho người dùng.
 */

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function successResponse(string $message = '', $data = [], int $code = 200): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'data'    => $data,
        ], $code);
    }

    protected function errorResponse(string $message = '', int $code = 400): JsonResponse
    {
        return response()->json(['message' => $message], $code);
    }

    protected function notAuthorizedResponse(): JsonResponse
    {
        return response()->json(['message' => 'You are not authorized to perform this action'], 403);
    }
}
