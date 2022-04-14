<?php
namespace App\Services\product;

use App\Repositories\Contracts\IProductRepository;
use App\Services\Contracts\IProductService;
use DateTime;
use Illuminate\Support\Facades\Hash;

class ProductService implements IProductService
{

    protected $productRepository;

    public function __construct(
        IProductRepository $productRepository
    ) {
       $this->productRepository = $productRepository;
    }

    public function list() {

        $data = $this->productRepository->list();
        return $data;
    }


    public function add(string $name,int $merchant_id,
                        float $price, string $status)
    {

        $data = $this->productRepository->add($name,$merchant_id,
                                            $price, $status);
        return $data;
    }


    public function listBy(int $id) {

        $data = $this->productRepository->listBy($id);
        return $data;
    }

    public function edit(int $id,string $name,int $merchant_id,
                        float $price, string $status)
    {

        $data = $this->productRepository->edit($id,$name,$merchant_id,
                                             $price, $status);
        return $data;
    }

    public function delete(int $id) {

        $data = $this->productRepository->delete($id);
        return $data;
    }

}
