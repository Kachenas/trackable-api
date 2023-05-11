<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BaseService
{
    protected function executeFunction(callable $function)
    {
        try {
            DB::beginTransaction();
            $data = call_user_func($function);
            DB::commit();
            return $this->petnetResponse(200, 'Good', $data, 200, 'Good', null);
        } catch (Exception $e) {
            // DB::rollback();
            return $this->petnetResponse(500, 'Failed', null, 500, 'DB', $e->getMessage());
        }
    }

    public function petnetResponse(
        $code,
        $message,
        $result = null,
        $httpCode = 200,
        $errorMessage = null,
        $line = null
    ) {
        if ($httpCode === 200) {
            return response()->json(
                [
                    "code" => $code,
                    "message" => $message,
                    "result" => $result,
                ],
                $httpCode
            );
        }
        return response()->json(
            [
                "code" => $code,
                "message" => $message,
                "error" => [
                    "module" => $errorMessage,
                    'message' => $line
                ]
            ],
            $httpCode
        );
    }

    public function exceptionResponse($exception, $payload = null, $module)
    {
        return $this->petnetResponse(
            422,
            "Unable to process your transaction at this moment",
            null,
            422,
            $module,
            $exception
        );
    }

    protected function customExecuteFunction(callable $function)
    {
        try {
            DB::beginTransaction();
            $data = call_user_func($function);
            DB::commit();
            return $this->petnetResponse(200, 'Good', $data, 200, 'Good', null);
        } catch (ModelNotFoundException $e) {
            // DB::rollback();
            $customMessage = "Invalid or Expired OTP";
            return $this->petnetResponse(500, 'Failed', null, 500, 'DB', $customMessage);
        }
    }
}
