<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function respond($payload, $message="", $status=200) {

        return response()->json([
            'data' => $payload,
            'message' => $message
        ], $status);
    }
}
