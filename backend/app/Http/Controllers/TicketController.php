<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tickets\StoreTicketRequest;
use App\Http\Requests\Tickets\UpdateTicketRequest;
use App\Services\TicketService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

class TicketController extends Controller
{
    public function __construct(protected TicketService $service)
    {
    }

    public function index(): JsonResponse
    {
        $tickets = $this->service->getAllTickets();

        return $this->successResponse(data: $tickets);
    }

    public function getAllWithPagination(Request $request, $reference): JsonResponse
    {
        $limit = $request->limit;
        $tickets = $this->service->getAllWithPagination($limit);

        return $this->successResponse(data: $tickets);
    }

    public function store(StoreTicketRequest $request): JsonResponse
    {
        //Code logic here

        return $this->successResponse('Ticket created successfully');
    }

    public function update(UpdateTicketRequest $request, $id): JsonResponse
    {
        try {
            //Code logic here
            return $this->successResponse('Ticket updated successfully');
        } catch (ModelNotFoundException) {
            return $this->errorResponse('This ticket does not exist', 404);
        } catch (AuthorizationException) {
            return $this->notAuthorizedResponse();
        }
    }

    public function destroy($id): JsonResponse
    {
        try {
            //Code logic here

            return $this->successResponse('Ticket deleted successfully');
        } catch (ModelNotFoundException) {
            return $this->errorResponse('This ticket does not exist', 404);
        } catch (AuthorizationException) {
            return $this->notAuthorizedResponse();
        }
    }

    public function forceDelete($id): JsonResponse
    {
        try
        {
            //Code logic here

            return $this->successResponse('Ticket permanently deleted successfully');
        } catch (ModelNotFoundException) {
            return $this->errorResponse('This ticket does not exist', 404);
        } catch (AuthorizationException) {
            return $this->notAuthorizedResponse();
        }
    }

    public function restore($id): JsonResponse
    {
        try
        {
            //Code logic here

            return $this->successResponse('Ticket restored successfully');
        } catch (ModelNotFoundException) {
            return $this->errorResponse('This ticket does not exist', 404);
        } catch (AuthorizationException) {
            return $this->notAuthorizedResponse();
        }
    }
}
