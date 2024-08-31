
<?php

it('fail-validate', function () {
    $response = sendAjaxRequest([
        'amount' => 'a',
        'buyer' => 'AAAAAAAAAAAAAAAAAAAAAA',
        'receipt_id' => 'ABC-123',
        'items' => ['item1', 'item2'],
        'buyer_email' => 'testbc',
        'note' => 'This is a test note  This is a test note  This is a test note aaaaa',
        'city' => 'New York',
        'phone' => '1234567890',
        'buyer_ip' => '127.0.0.1',
        'entry_at' => date('Y-m-d'),
        'hash_key' => hash('sha512', '123456', 'salt'),

    ]);

    $responseData = json_decode($response);

    expect($responseData->errors)->not->toBeEmpty();
    expect($responseData->success)->toBeFalse();
    expect($responseData->message)->toEqual('Validation failed!');
    expect(count((array) $responseData->errors))->toEqual(5);
    expect($responseData->errors->amount[0])->toEqual('The amount must be a number');
    expect($responseData->errors->buyer[0])->toEqual('The buyer may not be greater than 20 characters');
    expect($responseData->errors->buyer_email[0])->toEqual('The buyer_email must be a valid email address');
    expect($responseData->errors->note[0])->toEqual('The note may not be greater than 30 characters');

});

it('success-validate', function () {
    $response = sendAjaxRequest([
        'amount' => 123,
        'buyer' => 'AAAAAAAAAAAAAAAAAAA',
        'receipt_id' => 'ABC-123',
        'items' => ['item1', 'item2'],
        'buyer_email' => 'test@gmail.com',
        'note' => 'This is a test note ',
        'city' => 'New York',
        'phone' => '1234567890',
        'buyer_ip' => '127.0.0.1',
        'entry_at' => date('Y-m-d'),
        'hash_key' => hash('sha512', '123456', 'salt'),
        'entry_by' => 1,
    ]);

    $responseData = json_decode($response);

    expect($responseData->success)->toBeTrue();

    expect($responseData->message)->toEqual('Buyer created successfully!');

});

function sendAjaxRequest($data)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'http://buyer-registration.xyz/buyer/store');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['X-Requested-With: XMLHttpRequest']);

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}
