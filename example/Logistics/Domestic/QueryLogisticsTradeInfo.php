<?php

use Ecpay\Sdk\Factories\Factory;
use Ecpay\Sdk\Exceptions\RtnException;

require __DIR__ . '/../../../vendor/autoload.php';

try {
    $factory = new Factory([
        'hashKey' => '5294y06JbISpM5x9',
        'hashIv' => 'v77hoKGq4kWxNNIS',
        'hashMethod' => 'md5',
    ]);
    $postService = $factory->create('PostWithCmvVerifiedEncodedStrResponseService');

    $input = [
        'MerchantID' => '2000132',
        'AllPayLogisticsID' => '1718546',
        'TimeStamp' => time(),
    ];
    $url = 'https://logistics-stage.ecpay.com.tw/Helper/QueryLogisticsTradeInfo/V2';
    
    $response = $postService->post($input, $url);
    var_dump($response);
} catch (RtnException $e) {
    echo '(' . $e->getCode() . ')' . $e->getMessage() . PHP_EOL;
}
