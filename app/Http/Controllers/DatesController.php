<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Treatment;
use Illuminate\Support\Facades\DB;
use App\Date;

class DatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $dates = Date::all();
      return view('dates.index', compact('dates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all()->sortBy('first_name');
        $treatments = Treatment::all();
        return view('dates.create', compact(['clients','treatments']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $date = Date::create($request->all());
      $treatments = $request->input('treatments');
       for ($i = 0; $i < count($treatments); $i++){
          $date->treatments()->attach($treatments[$i]);
        }
      $date->save();

      return view('dates.test', compact('treatments'));
      /*$pQuantity = $request->input('pQuantity');
      $sale = Sale::find(15);
      for ($i = 0; $i <= count($products)-1; $i++)
        $name = $products[$i];
        $product = Product::find($name);
        $sale->products()->attach($product);
        $quantity = $pQuantity[$i];
        DB::update("UPDATE products SET quantity = quantity - '$quantity' WHERE name='$name' "); //diminuisci quantità prodotto
        $product = DB::select("SELECT * FROM products WHERE name='$name' ); */
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
