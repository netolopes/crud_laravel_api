<?php
namespace App\Services\merchant;

use App\Repositories\Contracts\IMerchantRepository;
use App\Services\Contracts\IMerchantService;
use Illuminate\Support\Facades\Hash;

class MerchantService implements IMerchantService
{

    protected $merchantRepository;

    public function __construct(
        IMerchantRepository $merchantRepository
    ) {
       $this->merchantRepository = $merchantRepository;
    }

    public function list() {

        $data = $this->merchantRepository->list();
        return $data;
    }


    public function add(string $merchant_name, int $admin_id) {

        $data = $this->merchantRepository->add($merchant_name, $admin_id);
        return $data;
    }


    public function listBy(int $id) {

        $data = $this->merchantRepository->listBy($id);
        return $data;
    }

    public function edit(int $id,string $merchant_name, int $admin_id) {

        $data = $this->merchantRepository->edit($id,$merchant_name, $admin_id);
        return $data;
    }

    public function delete(int $id) {

        $data = $this->merchantRepository->delete($id);
        return $data;
    }

}
