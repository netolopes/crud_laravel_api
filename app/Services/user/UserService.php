<?php
namespace App\Services\user;

use App\Repositories\Contracts\IUserRepository;
use App\Services\Contracts\IUserService;
use Illuminate\Support\Facades\Hash;

class UserService implements IUserService
{

    protected $userRepository;

    public function __construct(
        IUserRepository $userRepository
    ) {
       $this->userRepository = $userRepository;
    }

    public function list() {

        $data = $this->userRepository->list();
        return $data;
    }


    public function add(string $name, string $email, string $password, string $full_name,bool $is_admin) {

        $password =   Hash::make($password);
        $data = $this->userRepository->add($name, $email, $password, $full_name, $is_admin);
        return $data;
    }


    public function listBy(int $id) {

        $data = $this->userRepository->listBy($id);
        return $data;
    }

    public function edit(int $id,string $name, string $email, string $password, string $full_name,bool $is_admin) {

        // if (!Hash::check($old_password, $password)){
        //     return response()->json([
        //         'message' => '',
        //         'code' => '',
        //     ], 403);
        // }

        // if (Hash::check($password, $password)){
        //     return response()->json([
        //         'message' => '',
        //         'code' => '',
        //     ], 403);
        // }
        $password =   Hash::make($password);
        $data = $this->userRepository->edit($id,$name, $email, $password, $full_name, $is_admin);
        return $data;
    }

    public function delete(int $id) {

        $data = $this->userRepository->delete($id);
        return $data;
    }

}
