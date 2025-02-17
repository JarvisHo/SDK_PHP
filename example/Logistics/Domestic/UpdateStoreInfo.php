<?php

use Ecpay\Sdk\Factories\Factory;
use Ecpay\Sdk\Exceptions\RtnException;

require __DIR__ . '/../../../vendor/autoload.php';

try {
    $factory = new Factory([
        'hashKey' => 'XBERn1YOvpM9nfZc',
        'hashIv' => 'h1ONHk4P4yqbl5LK',
        'hashMethod' => 'md5',
    ]);
    $postService = $factory->create('PostWithCmvStrResponseService');

    $input = [
        'MerchantID' => '2000933',
        'AllPayLogisticsID' => '1718552',
        'CVSPaymentNo' => 'C9681067',
        'CVSValidationNo' => '2448',
        'StoreType' => '01',
        'ReceiverStoreID' => '131386',
    ];
    $url = 'https://logistics-stage.ecpay.com.tw/Express/UpdateStoreInfo';
    
    $response = $postService->post($input, $url);
    var_dump($response);
} catch (RtnException $e) {
    echo '(' . $e->getCode() . ')' . $e->getMessage() . PHP_EOL;
}
