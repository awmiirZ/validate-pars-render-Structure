<?php

namespace App\Formats;

use App\Models\JsonHandler;
use App\Models\HtmlHandler;
use App\Models\TextPlainHandler;

class FormatContext {
    protected $formatHandler;

    public function __construct(FormatHandler $formatHandler) {
        $this->formatHandler = $formatHandler;
    }

    public function executeOperations($data) {
        // Validate the data
        $isValid = $this->formatHandler->validate($data);

        if (!$isValid) {
            return 'Validation failed';
        }

        $parsedData = $this->formatHandler->parse($data);

        $renderedData = $this->formatHandler->render($parsedData);

        return $renderedData;
    }
}
