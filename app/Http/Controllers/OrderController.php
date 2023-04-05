<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function create()
    {
        $employees = $this->get_employees();
        $products = $this->get_products();
        return view('order.create', [
            'employees' => $employees,
            'products' => $products
        ]);
    }

    public function get_employees()
    {
        $response = Http::get('http://dummy.restapiexample.com/api/v1/employees');
        return $response->json()['data'] ?? [];
    }

    public function get_products()
    {
        $products = array([
            "product_name" => "product_1",
            "units" => array([
                "name" => "pak",
                "price" => 10000
            ],[
                "name" => "pcs",
                "price" => 1000
            ])
        ],[
            "product_name" => "product_2",
            "units" => array([
                "name" => "karton",
                "price" => 50000
            ],[
                "name" => "pak",
                "price" => 15000
            ])
        ]);
        return $products;
    }
}
