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
    $postService = $factory->create('PostWithCmvStrResponseService');

    $input = [
        'MerchantID' => '2000132',
        'AllPayLogisticsID' => '1718537',
        'GoodsAmount' => 1000,
        'Temperature' => '0001',
        'Distance' => '00',
        
        // 請參考 GetReturnResponse.php 範例開發
        'ServerReplyURL' => 'https://www.ecpay.com.tw/example/server-reply',
    ];
    $url = 'https://logistics-stage.ecpay.com.tw/Express/ReturnHome';
    
    $response = $postService->post($input, $url);
    var_dump($response);
} catch (RtnException $e) {
    echo '(' . $e->getCode() . ')' . $e->getMessage() . PHP_EOL;
}
