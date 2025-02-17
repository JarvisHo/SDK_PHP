<?php

use Ecpay\Sdk\Factories\Factory;
use Ecpay\Sdk\Exceptions\RtnException;

require __DIR__ . '/../../vendor/autoload.php';

try {
    $factory = new Factory([
        'hashKey' => '5294y06JbISpM5x9',
        'hashIv' => 'v77hoKGq4kWxNNIS',
    ]);
    $postService = $factory->create('PostWithCmvVerifiedEncodedStrResponseService');

    $input = [
        'MerchantID' => '2000132',
        'MerchantTradeNo' => '2019091711192742',
        'TimeStamp' => time(),
    ];
    $url = 'https://payment-stage.ecpay.com.tw/Cashier/QueryTradeInfo/V5';
    
    $response = $postService->post($input, $url);
    var_dump($response);
} catch (RtnException $e) {
    echo '(' . $e->getCode() . ')' . $e->getMessage() . PHP_EOL;
}
