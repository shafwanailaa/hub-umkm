<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
public function index()
{
    // Mengarah ke resources/views/orders/index.blade.php
    return view('orders.index');
}
}
