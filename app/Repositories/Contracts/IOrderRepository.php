<?php

namespace App\Repositories\Contracts;

interface IOrderRepository
{
    public function list();
    public function add(int $user_id, string $status);
    public function listBy(int $id);
    public function edit(int $id, int $user_id, string $status);
    public function delete(int $id);
}
