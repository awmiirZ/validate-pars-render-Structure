<?php

namespace App\Models;

use App\Formats\FormatHandler;
use App\Services\FormatService;

class JsonHandler implements FormatHandler
{
    protected $formatService;

    public function __construct(FormatService $formatService)
    {
        $this->formatService = $formatService;
    }

    public function validate($data)
    {
        return $this->formatService->validateJson($data);
    }

    public function parse($data)
    {
        return $this->formatService->parseJson($data);
    }

    public function render($data)
    {
        return $this->formatService->renderJson($data);
    }
}
