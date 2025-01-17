<?php

namespace App\Repositories\Interfaces;

use App\Repositories\RepositoryInterface;

/**
 * interface chứa các phương thức riêng của Model Ticket.
 */
interface TicketRepositoryInterface extends RepositoryInterface
{
    public function isExisting(string $reference): bool;

    public function getAllWithPagination(int $limit = 10);
}
