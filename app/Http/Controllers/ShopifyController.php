<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ShopifyService;
use App\Models\Collectible;
use Illuminate\Support\Facades\Log;


class ShopifyController extends Controller
{
    protected $shopifyService;

    public function __construct(ShopifyService $shopifyService)
    {
        $this->shopifyService = $shopifyService;
    }

    // Method to get customers from Shopify
    public function getCustomers()
    {
        try {
            $customers = $this->shopifyService->getCustomers();
            return response()->json($customers);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Method to get orders from Shopify
    public function getOrders()
    {
        try {
            $orders = $this->shopifyService->getOrders();
            return response()->json($orders);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Method to get products from Shopify and store them in the database


    public function getProducts()
    {
        try {
            // Fetch products from Shopify
            $products = $this->shopifyService->getProducts(); // Assuming this returns an array of arrays

            // Iterate over the first level of arrays (each group of products)
            foreach ($products as $productGroup) {
                // Check if the current item is an array
                if (is_array($productGroup)) {
                    // Now, iterate over each product in this group
                    foreach ($productGroup as $product) {
                        // Process only products with the product_type "Collectible Figure"
                        if (isset($product['product_type']) && $product['product_type'] === 'Collectible Figure') {
//dd($product);
                            $shopifyCreatedAt = isset($product['created_at']) ? (new \DateTime($product['created_at']))->format('Y-m-d H:i:s') : null;
                            $shopifyUpdatedAt = isset($product['updated_at']) ? (new \DateTime($product['updated_at']))->format('Y-m-d H:i:s') : null;

                            $productData = [
                                'shopify_id' => $product['id'],
                                'name' => $product['title'],
                                'description' => strip_tags($product['body_html']),
                                'vendor' => $product['vendor'],
                                'product_type' => $product['product_type'],
                                'shopify_created_at' => $shopifyCreatedAt,
                                'shopify_updated_at' => $shopifyUpdatedAt,
                                'price' => $product['variants'][0]['price'] ?? null,
                                'inventory_quantity' => $product['variants'][0]['inventory_quantity'] ?? null,
                                'sku' => $product['variants'][0]['sku'] ?? null,
                                'image_src' => $product['image']['src'] ?? null,
                            ];

                            // Store or update the collectible in the database
                            $collectible = Collectible::updateOrCreate(
                                ['shopify_id' => $product['id']],
                                $productData
                            );

                            Log::info('Collectible stored/updated', ['collectible' => $collectible]);
                        }
                    }
                } else {
                    return response()->json(['error' => 'Unexpected data format in product group'], 500);
                }
            }

            return response()->json(['message' => 'Products stored successfully']);
        } catch (\Exception $e) {
            Log::error('Error during Shopify sync', ['exception' => $e->getMessage()]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
