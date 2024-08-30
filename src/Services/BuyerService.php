<?php

namespace App\Services;

use BitApps\WPValidator\Validator;

class BuyerService
{

    /*
     * Check if the user has submitted the form multiple times in the last 24 hours.
     * @param string $cookieName
     * @return bool
     */

    public function checkMultipleSubmissions($cookieName): bool
    {
        if (isset($_COOKIE[$cookieName])) {
            $lastSubmissionTime = $_COOKIE[$cookieName];
            $currentTime = time();

            // Check if 24 hours have passed since the last submission
            if ($currentTime - $lastSubmissionTime < 86400) {
                return true;
            }
        }
        return false;
    }

    public function validatedData()
    {
        $validator = new Validator;

        $rules = [
            'amount' => ['required', 'numeric'],
            'buyer' => ['required', 'string', 'max:20'],
            'receipt_id' => ['required', 'string'],
            'items' => ['required', 'array'],
            'buyer_email' => ['required', 'email'],
            'note' => ['required', 'string', 'max:30'],
            'city' => ['required', 'string'],
            'phone' => ['required', 'string'],
        ];

        $validator = $validator->make($_POST, $rules);

        if ($validator->fails()) {
            $errors = $validator->errors();
            echo json_encode(['errors' => $errors, 'success' => false, 'message' => 'Validation failed!']);
            exit;
        }

        return $validator->validated();

    }

}
