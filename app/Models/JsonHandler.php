<?php

namespace App\Models;

use App\Formats\FormatHandler;
class JsonHandler implements FormatHandler {
    public function validate($data) {
        // JSON data validation logic for sign-up form
        $decodedData = json_decode($data, true);

        \Log::info('Decoded JSON data:', [$decodedData]);

        if (!isset($decodedData['name']) || !isset($decodedData['email']) || !isset($decodedData['password'])) {
            \Log::info('Validation failed: Required fields are missing.');
            return false;
        }

        if (!filter_var($decodedData['email'], FILTER_VALIDATE_EMAIL)) {
            \Log::info('Validation failed: Invalid email format.');
            return false;
        }


        \Log::info('Validation succeeded.');
        return true;
    }


    public function parse($data) {
        $data = json_decode($data, true);

        $parsedData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ];

        return $parsedData;
    }

    public function render($data) {
        $responseData = [
            'status' => 'success',
            'message' => 'User registered successfully!',
            'data' => $data,
        ];

        return json_encode($responseData);
    }
}
