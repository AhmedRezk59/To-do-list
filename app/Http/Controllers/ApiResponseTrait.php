<?php
namespace App\Http\Controllers;

trait ApiResponseTrait {
    public function ApiResponse($data = null , $status = null, $msg = null ){
        $array = [
            'data' => $data,
            'message' => $msg,
            'status' => $status
        ];

        return response($array , $status);
    }
}