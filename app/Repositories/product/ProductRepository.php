<?php
namespace App\Repositories\product;

use App\Models\Product;
use App\Repositories\Contracts\IProductRepository;
use DateTime;

class ProductRepository  implements IProductRepository
{

    protected $product;

    public function __construct(
       Product $product
    ) {
       $this->product = $product;
    }

    public function list(){

        return $this->product::paginate(15);

    }

    public function add(string $name,int $merchant_id,
                        float $price, string $status){

        return $this->product::create([
            'name' => $name,
            'merchant_id' => $merchant_id,
            'price' => $price,
            'status' => $status,
            'created_at' => new DateTime()
        ]);
    }

    public function listBy(int $id){

     $data =  $this->product::find($id);
     return $data;

    }

    public function edit(int $id, string $name,int $merchant_id,
    float $price, string $status){

         $obj =  $this->product::findOrFail($id);
           $obj->name = $name;
           $obj->merchant_id = $merchant_id;
           $obj->price = $price;
           $obj->status = $status;
           $obj->created_at = new DateTime();

           if( $obj->save() ){
            return  $obj;
          }
    }

    public function delete(int $id){

        $obj =  $this->product::findOrFail($id);

          if( $obj->delete() ){
           return  $obj;
         }
   }

}
