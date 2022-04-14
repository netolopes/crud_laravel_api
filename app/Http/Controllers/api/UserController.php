<?php
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Requests\UserRequest;
use App\Services\Contracts\IUserService;

class UserController extends Controller
{

    protected $userService;

    public function __construct
    (
        IUserService $userService
    )
    {
        $this->userService = $userService;
    }


    public function index()
    {
        try{

            $data = $this->userService->list();
            return UserResource::collection($data);

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


    public function store(UserRequest $request)
    {

        try{

            $data = (object)$request->only([
                'name',
                'email',
                'password',
                'full_name',
                'is_admin',
            ]);

            $data = $this->userService->add($data->name,$data->email,$data->password,$data->full_name,$data->is_admin);
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

            $data = $this->userService->listBy($id);
            return new UserResource($data);

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
                'email',
                'password',
                'full_name',
                'is_admin'
            ]);

            $data = $this->userService->edit($data->id,$data->name,$data->email,$data->password,$data->full_name,$data->is_admin);
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

            $data = $this->userService->delete($data->id);
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
