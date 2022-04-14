<?php
namespace App\Repositories\order;

use App\Models\Order;
use App\Repositories\Contracts\IOrderRepository;


class OrderRepository  implements IOrderRepository
{

    protected $order;

    public function __construct(
       Order $order
    ) {
       $this->order = $order;
    }

    public function list(){

        return $this->order::paginate(15);

    }

    public function add(int $user_id, string $status){

        return $this->order::create([
            'user_id' => $user_id,
            'status' => $status
        ]);
    }

    public function listBy(int $id){

     $data =  $this->order::find($id);
     return $data;

    }

    public function edit(int $id, int $user_id, string $status){

         $obj =  $this->order::findOrFail($id);
           $obj->user_id = $user_id;
           $obj->status = $status;

           if( $obj->save() ){
            return  $obj;
          }
    }

    public function delete(int $id){

        $obj =  $this->order::findOrFail($id);

          if( $obj->delete() ){
           return  $obj;
         }
   }

}
