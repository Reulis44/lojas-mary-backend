<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PedidosRequest;
use App\Services\PedidosService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    use ApiResponseTrait;

    public $service;

    public function __construct(PedidosService $service)
    {
        $this->service = $service;
    }

    public function all()
    {
        try {
            $data = $this->service->all();
            return self::apiResponseSuccess($data);
        } catch (\Throwable $th) {
            return self::apiServerError($th->getMessage());
        }
    }

    public function find($id)
    {
        try {
            $data = $this->service->find($id);
            if(!$data) {
                $erros = "Pedido $id não encontrado";
                return self::apiResponseError($erros);
            }
            return self::apiResponseSuccess($data);
        } catch (\Throwable $th) {
            return self::apiServerError($th->getMessage());
        }
    }

    public function create(PedidosRequest $request)
    {
        try {
            $data = $this->service->create($request->all());
            return self::apiResponseSuccess($data);
        } catch (\Throwable $th) {
            $msg = $th->getMessage() . " ";
            $msg .= $th->getFile() . " ";
            $msg .= $th->getLine();
            return self::apiServerError($msg);
        }
    }

    public function update(Request $request)
    {
        try {
            $data = $this->service->update($request?->id, $request->all());
            if(!$data['status']) {
                return self::apiResponseError($data['message']);
            }
            return self::apiResponseSuccess($data);
        } catch (\Throwable $th) {
            $msg = $th->getMessage() . " ";
            $msg .= $th->getFile() . " ";
            $msg .= $th->getLine();
            return self::apiServerError($msg);
        }
    }

    public function delete (Request $request)
    {
        try {
            $data = $this->service->delete($request?->id);

            if(gettype($data) === "array" && !$data['status']) {
                return self::apiResponseError($data['message']);
            }

            return self::apiResponseSuccess($data);
        } catch (\Throwable $th) {
            $msg = $th->getMessage() . " ";
            $msg .= $th->getFile() . " ";
            $msg .= $th->getLine();
            return self::apiServerError($msg);
        }
    }
}
