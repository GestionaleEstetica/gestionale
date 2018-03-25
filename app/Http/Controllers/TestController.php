<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Product;

class TestController extends Controller
{
    public function index()
    {
    	$sale = Sale::find(5);
    	$products = Product::all();
    	return view('test',compact(['sale','products']));
    }
}
