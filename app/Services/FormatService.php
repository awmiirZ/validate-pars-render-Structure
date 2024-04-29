<?php
namespace App\Services;

class FormatService
{
    public function processData($data)
    {
        // Decode the JSON data
        $decodedData = json_decode($data, true);

        // Check if decoding was successful
        if ($decodedData === null && json_last_error() !== JSON_ERROR_NONE) {
            return ['success' => false, 'message' => 'Invalid JSON data'];
        }

        // Validate the decoded data (assuming a simple validation)
        if (!isset($decodedData['name']) || !isset($decodedData['email']) || !isset($decodedData['password'])) {
            return ['success' => false, 'message' => 'Required fields are missing'];
        }

        // Format the data (for demonstration purposes, just returning the decoded data)
        return ['success' => true, 'data' => $decodedData];
    }
}
