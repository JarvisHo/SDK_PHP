<?php

namespace Ecpay\Sdk\Services;

use Ecpay\Sdk\Interfaces\Request\RequestInterface;
use Ecpay\Sdk\Request\Request;

class JsonFormatService
{
    /**
     * RequestInterface
     *
     * @var request
     */
    protected $request;

    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
    }

    /**
     * 產生 JSON
     *
     * @param  array  $input
     * @param  string $action
     */
    public function generate($input, $action)
    {
        $request = $this->request->toArray($input);

        return [
            'url' => $action,
            'payload' => $request
        ];
    }
}
