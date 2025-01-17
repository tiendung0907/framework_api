<?php

namespace App\Models;

use App\Builders\TicketBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mews\Purifier\Casts\CleanHtml;

/**
 * Ý nghĩa:
 * Model đại diện cho một bảng trong cơ sở dữ liệu và quản lý dữ liệu liên quan.
 * Là nơi bạn định nghĩa các quy tắc kinh doanh, quan hệ giữa các bảng, và logic thao tác với dữ liệu.
 * Eloquent ORM của Laravel giúp ánh xạ bảng thành các model dễ sử dụng.
 * Chức năng chính:
 * Tương tác trực tiếp với cơ sở dữ liệu (CRUD - Create, Read, Update, Delete).
 * Xử lý các mối quan hệ giữa các bảng (One-to-One, One-to-Many, Many-to-Many).
 */
class Ticket extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'subject'     => CleanHtml::class,
        'description' => CleanHtml::class,
        'created_at'  => 'datetime:M d, Y',
        'resolved_at' => 'datetime:M d, Y',
    ];

    public function newEloquentBuilder($query): TicketBuilder
    {
        return new TicketBuilder($query);
    }
}
