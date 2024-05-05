<?php
namespace App\Services;

use App\Repositories\UserRepository;

class FormatService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function processData($data)
    {
        $decodedData = json_decode($data, true);

        if ($decodedData === null && json_last_error() !== JSON_ERROR_NONE) {
            return ['success' => false, 'message' => 'Invalid JSON data'];
        }

        if (!isset($decodedData['name']) || !isset($decodedData['email']) || !isset($decodedData['password'])) {
            return ['success' => false, 'message' => 'Required fields are missing'];
        }

        return ['success' => true, 'data' => $decodedData];
    }
}
