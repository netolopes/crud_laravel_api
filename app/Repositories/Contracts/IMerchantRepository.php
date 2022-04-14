<?php

namespace App\Repositories\Contracts;

interface IMerchantRepository
{
    public function list();
    public function add(string $merchant_name, int $admin_id);
    public function listBy(int $id);
    public function edit(int $id, string $merchant_name, int $admin_id);
    public function delete(int $id);
}
