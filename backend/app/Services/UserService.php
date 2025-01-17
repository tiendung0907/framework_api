<?php

namespace App\Services;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;

/**
 * Ý nghĩa:
 *      Service chứa logic nghiệp vụ chính của ứng dụng.
 *      Đóng vai trò là tầng xử lý logic giữa Controller và Repository/Model.
 *      Giúp tách biệt logic nghiệp vụ phức tạp khỏi controller để controller trở nên nhẹ hơn.
 * Chức năng chính:
 *      Kết hợp dữ liệu từ nhiều repository hoặc xử lý các logic phức tạp.
 *      Đóng vai trò là "bộ điều phối" cho các tác vụ liên quan đến nghiệp vụ.
 */

class UserService
{
    public function __construct(protected UserRepositoryInterface $repository)
    {
    }
    /**
     * @throws AuthenticationException
     */
    public function login(array $credentials): array
    {
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            return [
                'user'  => $user,
                'token' => $user->createToken('auth_token')->plainTextToken,
            ];
        }

        throw new AuthenticationException('Invalid credentials');
    }


}
