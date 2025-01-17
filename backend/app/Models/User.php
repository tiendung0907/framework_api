<?php

namespace App\Models;

use App\Builders\UserBuilder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Ý nghĩa:
 * Model đại diện cho một bảng trong cơ sở dữ liệu và quản lý dữ liệu liên quan.
 * Là nơi bạn định nghĩa các quy tắc kinh doanh, quan hệ giữa các bảng, và logic thao tác với dữ liệu.
 * Eloquent ORM của Laravel giúp ánh xạ bảng thành các model dễ sử dụng.
 * Chức năng chính:
 * Tương tác trực tiếp với cơ sở dữ liệu (CRUD - Create, Read, Update, Delete).
 * Xử lý các mối quan hệ giữa các bảng (One-to-One, One-to-Many, Many-to-Many).
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at'        => 'datetime:M d, Y h:i A',
    ];

    public function password(): Attribute
    {
        return Attribute::make(set: fn($value) => bcrypt($value));
    }

    public function isManager(): bool
    {
        return $this->isAdmin() || $this->isAgent();
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isAgent(): bool
    {
        return $this->role === 'agent';
    }

    public function isClient(): bool
    {
        return $this->role === 'client';
    }

    public function newEloquentBuilder($query): UserBuilder
    {
        return new UserBuilder($query);
    }
}
