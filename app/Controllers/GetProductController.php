<?php

namespace App\Controllers;
use App\Models\Product;

class GetProductController extends BaseController
{
    public function index(): string
    {
        return view('shop_page');
    }

    public function get_with_id(int $id): string
    {
        $product = new Product($id);
        return view('product', $product->getFullInfo());
    }

    public function get_through_collections(): string
    {
        return view('collections');
    }
}
