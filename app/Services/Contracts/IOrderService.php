<?php

namespace App\Services\Contracts;

interface IOrderService
{
     public function list();
     public function add(int $user_id, string $status);
     public function listBy(int $id);
     public function edit(int $id, int $user_id, string $status);
     public function delete(int $id);
}
