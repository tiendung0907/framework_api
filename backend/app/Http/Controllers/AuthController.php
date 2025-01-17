<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Services\UserService;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;


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

class AuthController extends Controller
{
    public function __construct(protected UserService $service)
    {
    }

    public function login(LoginRequest $request): JsonResponse
    {
        try {
            $credentials = $this->service->login($request->validated());

            return $this->successResponse('Login successful', $credentials);
        } catch (AuthenticationException $e) {
            return $this->errorResponse($e->getMessage(), 401);
        }
    }

}
