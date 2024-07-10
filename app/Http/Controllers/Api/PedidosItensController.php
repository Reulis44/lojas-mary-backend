<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PedidosItensRequest;
use App\Services\PedidosItensService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class PedidosItensController extends Controller
{
    use ApiResponseTrait;

    protected $service;
    public function __construct(PedidosItensService $service)
    {
        $this->service = $service;
    }

    public function all()
    {
        try {
            $data = $this->service->all();
            return self::apiResponseSuccess($data);
        } catch (\Throwable $th) {
            return self::apiResponseError($th->getMessage());
        }
    }

    public function find($id)
    {
        try {
            $data = $this->service->find($id);
            return self::apiResponseSuccess($data);
        } catch (\Throwable $th) {
            return self::apiResponseError($th->getMessage());
        }
    }

    public function create(PedidosItensRequest $request)
    {
        try {
            $data = $this->service->create($request->all());
            return self::apiResponseSuccess($data);
        } catch (\Throwable $th) {
            return self::apiResponseError($th->getMessage());
        }
    }

    public function update(PedidosItensRequest $request, $id)
    {
        try {
            $data = $this->service->update($id, $request->all());
            return self::apiResponseSuccess($data);
        } catch (\Throwable $th) {
            return self::apiResponseError($th->getMessage());
        }
    }

    public function delete (PedidosItensRequest $request)
    {
        try {
            $data = $this->service->delete($request->id);
            return self::apiResponseSuccess($data);
        } catch (\Throwable $th) {
            return self::apiResponseError($th->getMessage());
        }
    }
}
