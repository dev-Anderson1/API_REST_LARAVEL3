<?php

namespace App\Controllers\Api;

use App\Http\Controllers\Api\ProductController;

class ApiError extends Api
{
     public function errorMessage($message, $code)
    {
        return [
            'data'=>[

                'msg'=>$message,
                'code' =>$code

            ]
        ];
    }
}