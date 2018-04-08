<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Treatment;
use App\Utility\Utility;
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
      return view('dates.index',compact('dates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
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
      $date = Date::create($request->except('treatments'));
      
      $treatments = json_decode($request->get('treatments'),true);

      $treatments = Utility::create_mapping($treatments,'name');

      foreach ($treatments as $name => $quantity) 
      {
          $treatment = Treatment::where('name', '=' , $name)->firstOrFail();
          $date->treatments()->attach($treatment,['quantity' => $quantity]);
      }

      $dates = Date::all();
      return view('dates.index', compact('dates'))->with('success','Appuntamento creato con successo');
    
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
      $clients = Client::all();
      $date = Date::findOrFail($id);
      return view('dates.edit', compact(['date', 'clients']));
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
      Date::findOrFail($id)->update($request->all());
      $dates = Date::all();
      return view('dates.index', compact('dates'))->with('success','Appuntamento modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $date = Date::findOrFail($id);
      $date->delete();

      return redirect('/dates')->with('success','Appuntamento rimosso con successo');
    }

    public function markAsDone($id){
      $date = Date::findOrFail($id);
      $date->done = 1;
      $date->save();
      return redirect('/dates');
    }
}
