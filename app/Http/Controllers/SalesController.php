<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Sale;
use App\Product;
use App\Treatment;
use App\Utility\Utility;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sales.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $treatments = Treatment::all();
        return view('sales.create', compact(['products', 'treatments']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products = json_decode($request->get('products'),true);
        $treatments = json_decode($request->get('treatments'),true);

        $products = Utility::create_mapping($products,'name');
        $treatments = Utility::create_mapping($treatments,'name');
        
        $sale = new Sale();
        $sale->save();

        foreach ($products as $name => $quantity) 
        {
            $product = Product::where('name', '=' , $name)->firstOrFail();
            $sale->products()->attach($product,['quantity' => $quantity]);
        }

        foreach ($treatments as $name => $quantity) 
        {
            $treatment = Treatment::where('name', '=' , $name)->firstOrFail();
            $sale->treatments()->attach($treatment,['quantity' => $quantity]);
        }
        return 'carlo';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
