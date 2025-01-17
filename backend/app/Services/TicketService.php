<?php

namespace App\Services;

use App\Repositories\Interfaces\TicketRepositoryInterface;

/**
 * Ý nghĩa:
 *      Service chứa logic nghiệp vụ chính của ứng dụng.
 *      Đóng vai trò là tầng xử lý logic giữa Controller và Repository/Model.
 *      Giúp tách biệt logic nghiệp vụ phức tạp khỏi controller để controller trở nên nhẹ hơn.
 * Chức năng chính:
 *      Kết hợp dữ liệu từ nhiều repository hoặc xử lý các logic phức tạp.
 *      Đóng vai trò là "bộ điều phối" cho các tác vụ liên quan đến nghiệp vụ.
 */
class TicketService
{
    protected TicketRepositoryInterface $ticketRepository;
    public function __construct(TicketRepositoryInterface $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }

    public function getAllTickets(): array
    {
        return $this->ticketRepository->getAll();
    }

    public function getAllWithPagination($limit = 10): array
    {
        return $this->ticketRepository->getAllWithPagination($limit);
    }

    public function assignRandomReference(): string
    {
        do $reference = generateTicketReference();
        while ($this->ticketRepository->isExisting($reference));

        return $reference;
    }
}
