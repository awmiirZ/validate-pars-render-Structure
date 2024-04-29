<?php

namespace App\Formats;

interface FormatHandler {
    public function validate($data);
    public function parse($data);
    public function render($data);
}
