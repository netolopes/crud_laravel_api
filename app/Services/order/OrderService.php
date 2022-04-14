<?php
namespace App\Services\order;

use App\Repositories\Contracts\IOrderRepository;
use App\Services\Contracts\IOrderService;
use Illuminate\Support\Facades\Hash;

class OrderService implements IOrderService
{

    protected $orderRepository;

    public function __construct(
        IOrderRepository $orderRepository
    ) {
       $this->orderRepository = $orderRepository;
    }

    public function list() {

        $data = $this->orderRepository->list();
        return $data;
    }


    public function add(int $user_id, string $status) {

        $data = $this->orderRepository->add($user_id, $status);
        return $data;
    }


    public function listBy(int $id) {

        $data = $this->orderRepository->listBy($id);
        return $data;
    }

    public function edit(int $id,int $user_id, string $status) {

        $data = $this->orderRepository->edit($id,$user_id, $status);
        return $data;
    }

    public function delete(int $id) {

        $data = $this->orderRepository->delete($id);
        return $data;
    }

}
