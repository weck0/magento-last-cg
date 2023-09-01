<?php
namespace Wecko\ApiCall\Model;

class ApiCaller
{
    protected $httpClient;

    public function __construct(\Magento\Framework\HTTP\Client\Curl $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function makeApiCall($url)
    {
        $this->httpClient->get($url);
        return $this->httpClient->getBody();
    }
}
