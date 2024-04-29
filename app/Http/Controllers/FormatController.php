<?php

namespace App\Http\Controllers;

use App\Models\JsonHandler;
use App\Formats\FormatContext;
use Illuminate\Http\Request;
use App\Services\FormatService;


class FormatController extends Controller
{
    protected $formatService;

    public function __construct(FormatService $formatService)
    {
        $this->formatService = $formatService;
    }

    public function process(Request $request)
    {
        // Retrieve data from the request body
        $data = $request->getContent();

        // Process the data using the FormatService
        $result = $this->formatService->processData($data);

        // Return the result to the user
        return response()->json(['result' => $result]);
    }



}
