<?php
namespace App\Repositories\merchant;

use App\Models\Merchant;
use App\Repositories\Contracts\IMerchantRepository;


class MerchantRepository  implements IMerchantRepository
{

    protected $merchant;

    public function __construct(
       Merchant $merchant
    ) {
       $this->merchant = $merchant;
    }

    public function list(){

        return $this->merchant::paginate(15);

    }

    public function add(string $merchant_name, int $admin_id){

        return $this->merchant::create([
            'merchant_name' => $merchant_name,
            'admin_id' => $admin_id
        ]);
    }

    public function listBy(int $id){

     $data =  $this->merchant::find($id);
     return $data;

    }

    public function edit(int $id, string $merchant_name, int $admin_id){

         $obj =  $this->merchant::findOrFail($id);
           $obj->merchant_name = $merchant_name;
           $obj->admin_id = $admin_id;

           if( $obj->save() ){
            return  $obj;
          }
    }

    public function delete(int $id){

        $obj =  $this->merchant::findOrFail($id);

          if( $obj->delete() ){
           return  $obj;
         }
   }

}
