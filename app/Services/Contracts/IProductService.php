<?php

namespace App\Services\Contracts;

use DateTime;

interface IProductService
{
     public function list();
     public function add(string $name,int $merchant_id,
                         float $price, string $status);
     public function listBy(int $id);
     public function edit(int $id, string $name,int $merchant_id,
                        float $price, string $status);
     public function delete(int $id);
}
