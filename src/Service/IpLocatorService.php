<?php
namespace App\Service;

use Cake\Http\Client;

class IpLocatorService
{
    public function getLocation(string $ip): array
    {
        $http = new Client();
        $response = $http->get("http://ip-api.com/json/{$ip}");

        if ($response->isOk()) {
            return $response->getJson();
        }

        return ['status' => 'fail'];
    }
}
