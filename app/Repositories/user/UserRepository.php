<?php
namespace App\Repositories\user;

use App\Models\User;
use App\Repositories\Contracts\IUserRepository;


class UserRepository  implements IUserRepository
{

    protected $user;

    public function __construct(
       User $user
    ) {
       $this->user = $user;
    }

    public function list(){

        return $this->user::paginate(15);

    }

    public function add(string $name, string $email, string $password, string $full_name,bool $is_admin){

        return $this->user::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'full_name' => $full_name,
            'is_admin' => $is_admin
        ]);
    }

    public function listBy(int $id){

     $data =  $this->user::find($id);
     return $data;

    }

    public function edit(int $id, string $name, string $email, string $password, string $full_name,bool $is_admin){

         $obj =  $this->user::findOrFail($id);
           $obj->name = $name;
           $obj->email = $email;
           $obj->password = $password;
           $obj->full_name =  $full_name;
           $obj->is_admin = $is_admin;

           if( $obj->save() ){
            return  $obj;
          }
    }

    public function delete(int $id){

        $obj =  $this->user::findOrFail($id);

          if( $obj->delete() ){
           return  $obj;
         }
   }

}
