<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;
use App\User;
use App\Sale;
use App\Date;
use App\Treatment;
use App\Product;


use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        $dates = Date::all();
        $sales = Sale::all();
        $treatments = Treatment::all();
        $products = Product::all();
        return view('admin.stats.index', compact(['clients','dates', 'sales', 'treatments', 'products']));
    }

    public function showSales()
    {
      $sales = Sale::all();
      $users = User::all();
      return view('admin.stats.showSales', compact(['sales', 'users']));
    }

}
