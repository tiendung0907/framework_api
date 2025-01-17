<?php

namespace App\Repositories\Eloquent;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;

/**
 * Ý nghĩa:
 * Repository là một lớp trung gian giữa Model và Service/Controller.
 * Nó chịu trách nhiệm xử lý dữ liệu: truy vấn, lọc, hoặc bất kỳ thao tác nào liên quan đến dữ liệu.
 * Tách biệt logic truy vấn dữ liệu khỏi controller và service, giúp dễ dàng tái sử dụng và thay đổi.
 * Chức năng chính:
 * Đóng gói các truy vấn dữ liệu phức tạp.
 * Định nghĩa các phương thức cụ thể để làm việc với dữ liệu.
 */

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    //lấy model tương ứng
    public function getModel(): string
    {
        return \App\Models\User::class;
    }
}
