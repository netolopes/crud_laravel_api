<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Requests\ProductRequest;
use App\Services\Contracts\IProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $productService;

    public function __construct
    (
        IProductService $productService
    )
    {
        $this->productService = $productService;
    }


    public function index()
    {
        try{

            $data = $this->productService->list();
            return ProductResource::collection($data);

        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'error' => $e->getMessage()
                ],
                403
            );
        }
    }


    public function store(ProductRequest $request)
    {

        try{

            $data = (object)$request->only([
                'name',
                'merchant_id',
                'price',
                'status',
                'permission'
            ]);

            if($data->permission->is_admin == 0){

                return response()->json(
                    [
                        'success' => false,
                        'permission' => 'User without permission!'
                    ],
                    403
                );

            }else{

            $data = $this->productService->add($data->name,$data->merchant_id,
                                        $data->price,$data->status);
            return $data;

            }

        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'error' => $e->getMessage()
                ],
                403
            );
        }

    }


    public function show($id)
    {
        try{

            $data = $this->productService->listBy($id);
            return new ProductResource($data);

        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'error' => $e->getMessage()
                ],
                403
            );
        }
    }


    public function update(Request $request)
    {

        try{

            $data = (object)$request->only([
                'id',
                'name',
                'merchant_id',
                'price',
                'status',
                'permission'
            ]);

            if($data->permission->is_admin == 0){

                return response()->json(
                    [
                        'success' => false,
                        'permission' => 'User without permission!'
                    ],
                    403
                );

            }else{

            $data = $this->productService->edit($data->id,$data->name,$data->merchant_id,
                                            $data->price,$data->status);
            return $data;

            }

        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'error' => $e->getMessage()
                ],
                403
            );
        }

    }

    public function destroy(Request $request)
    {
        try{

            $data = (object)$request->only([
                'id'
            ]);

            $data = $this->productService->delete($data->id);
            return $data;

        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'error' => $e->getMessage()
                ],
                403
            );
        }
    }
    }
