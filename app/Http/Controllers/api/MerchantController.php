<?php
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MerchantRequest;
use App\Http\Resources\MerchantResource;
use App\Services\Contracts\IMerchantService;


class MerchantController extends Controller
{

protected $merchantService;

public function __construct
(
    IMerchantService $merchantService
)
{

    $this->merchantService = $merchantService;
}


public function index()
{
    try{

        (object)$data = $this->merchantService->list();
        return MerchantResource::collection($data);

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


public function store(MerchantRequest $request)
{

    try{

        $data = (object)$request->only([
            'merchant_name',
            'admin_id'


        ]);

            $data = $this->merchantService->add($data->merchant_name,$data->admin_id);
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

        $data = $this->merchantService->listBy($id);
        return new MerchantResource($data);

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
            'merchant_name',
            'admin_id'
        ]);

        $data = $this->merchantService->edit($data->id,$data->merchant_name,$data->admin_id);
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

        $data = $this->merchantService->delete($data->id);
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
