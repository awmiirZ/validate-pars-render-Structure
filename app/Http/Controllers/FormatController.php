<?php

namespace App\Http\Controllers;

use App\Models\JsonHandler;
use App\Formats\FormatContext;
use Illuminate\Http\Request;

class FormatController extends Controller
{
    public function process(Request $request)
    {
        $data = $request->getContent();

        $formatHandler = new JsonHandler();

        $context = new FormatContext($formatHandler);

        $result = $context->executeOperations($data);

        $response = [
            'status' => 'success',
            'message' => 'User registered successfully!',
            'data' => $result
        ];

        return response()->json($response);
    }



}
