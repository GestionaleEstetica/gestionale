<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
class TestController extends Controller
{
    public function index()
    {
    	$sale = Sale::find(1);
    	return view('test',compact('sale'));
    }
}
