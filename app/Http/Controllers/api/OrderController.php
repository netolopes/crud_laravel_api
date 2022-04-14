<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Http\Requests\OrderRequest;
use App\Services\Contracts\IOrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    protected $orderService;

    public function __construct
    (
        IOrderService $orderService
    )
    {
        $this->orderService = $orderService;
    }


    public function index()
    {
        try{

            $data = $this->orderService->list();
            return OrderResource::collection($data);

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


    public function store(OrderRequest $request)
    {

        try{

            $data = (object)$request->only([
                'user_id',
                'status'
            ]);

            $data = $this->orderService->add($data->user_id,$data->status);
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


    public function show($id)
    {
        try{

            $data = $this->orderService->listBy($id);
            return new OrderResource($data);

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
                'user_id',
                'status'
            ]);

            $data = $this->orderService->edit($data->id,$data->user_id,$data->status);
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

    public function destroy(Request $request)
    {
        try{

            $data = (object)$request->only([
                'id'
            ]);

            $data = $this->orderService->delete($data->id);
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
