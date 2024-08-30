<?php

namespace App\Controllers;

use App\Models\Buyer;
use App\Services\BuyerService;
use App\Utility;

class BuyerController
{

    /*
     * Show the list of buyers.
     * @return array
     */

    public function index()
    {

        $startDate = $_GET['start_date'] ?? null;

        $endDate = $_GET['end_date'] ?? null;

        $buyers = (new Buyer)->all($startDate, $endDate);

        Utility::view('buyer/index', ['buyers' => $buyers]);
    }

    /*
     * Show the form for creating a new buyer.
     */

    public function create()
    {
        Utility::view('buyer/create');
    }

    /*
     * Store a newly created buyer in the database.
     */

    public function store()
    {

        $cookieName = 'form_submission_time';

        $buyerService = new BuyerService();

        $isMultipleSubmissions = $buyerService->checkMultipleSubmissions($cookieName);

        if ($isMultipleSubmissions) {
            // echo json_encode(['message' => 'You have already submitted a form in the last 24 hours!', 'success' => false]);
            // return;
        }

        $data = $buyerService->validatedData();

        $data['buyer_ip'] = $_SERVER['REMOTE_ADDR'];

        $data['items'] = implode(',', $data['items']);

        $data['hash_key'] = hash('sha512', $data['receipt_id'] . 'salt');

        $data['entry_at'] = date('Y-m-d');

        $inserted = (new Buyer)->create($data);

        if ($inserted) {
            setcookie($cookieName, time(), time() + 86400, "/");

            echo json_encode(['message' => 'Buyer created successfully!', 'success' => true]);

            return;
        } else {
            echo json_encode(['message' => 'Failed to create buyer!', 'success' => false]);
            return;
        }
    }

}
