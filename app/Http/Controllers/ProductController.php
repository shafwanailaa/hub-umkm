<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Pastikan kamu sudah punya file resources/views/products/index.blade.php
        return view('products.index');
    }
}
