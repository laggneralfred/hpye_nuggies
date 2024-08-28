<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class ShopifyService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://' . env('SHOPIFY_STORE_URL') . '/admin/api/' . env('SHOPIFY_API_VERSION') . '/',
            'headers' => [
                'X-Shopify-Access-Token' => env('SHOPIFY_ACCESS_TOKEN'),
                'Accept' => 'application/json',
            ],
        ]);
    }

    public function getProducts()
    {
        return $this->get('products.json');
    }

    public function getCustomers()
    {
        return $this->get('customers.json');
    }

    public function getOrders()
    {
        return $this->get('orders.json');
    }

    private function get($endpoint)
    {
        try {
            $response = $this->client->get($endpoint);
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            // Handle API request errors
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $message = $response->getBody()->getContents();
                // Log or handle the error as needed
            } else {
                $message = $e->getMessage();
            }
            throw new \Exception("Shopify API error: " . $message);
        }
    }
}
