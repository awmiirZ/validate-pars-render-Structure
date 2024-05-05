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
        $data = $request->getContent();

        $result = $this->formatService->processData($data);

        return response()->json(['result' => $result]);
    }



}
