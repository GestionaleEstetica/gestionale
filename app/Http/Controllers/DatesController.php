<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\User;
use App\Treatment;
use App\Utility\Utility;
use Illuminate\Support\Facades\DB;
use App\Date;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

class DatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $date = Carbon::parse(Input::get('date'))->toDateString();
      if (!isset($date)) $date = Carbon::today()->toDateString();
      //$date = Carbon::createFromFormat('Y-m-d', $date)->format('d-m-Y');
      $dates = DB::table('dates')
        ->select('*')
        ->where('date', '=', $date)
        ->get();
      $users = User::all();
      $clients = Client::all();
      return view('dates.index',compact(['date','dates','users','clients']));
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
        $orario = Input::get('orario');
        $orario = Carbon::createFromTimeString($orario)->format('H:i:s');
        $user = Input::get('user');
        $data = Input::get('data');
        return view('dates.create', compact(['clients','treatments','orario','user','data']));
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
      $date = Carbon::today()->toDateString();
      $dates = DB::table('dates')
        ->select('*')
        ->where('date', '=', Carbon::today()->toDateString())
        ->get();
      $users = User::all();
      $clients = Client::all();
      return view('dates.index', compact(['dates','users','date','clients']))->with('success','Appuntamento creato con successo');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $date = Date::findOrFail($id);
      $client = Client::findOrFail($date->client_id);
      return view('dates.show',compact(['date','client']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $date = Date::findOrFail($id);
      $clients = Client::all();
      $client = Client::findOrFail($date->client_id);
      $treatments = Treatment::all();
      return view('dates.edit', compact(['date', 'clients','client','treatments']));
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
      //$date = Date::where('id', '=' , $id)->firstOrFail()->update($request->except('treatments'));
      Date::findOrFail($id)->update([
        'client_id' => $request->get('client_id'),
        'date' => $request->get('date'),
        'time' => $request->get('time'),
        'description' => $request->get('description')]);
      $date = Date::findOrFail($id);
      $dates = Date::all();

      $treatments = json_decode($request->get('treatments'),true);
      $quantity = Utility::create_date_mapping($treatments,'name');

      foreach($quantity as $key => $value)
      {
          $treatment = Treatment::where('name', '=' , $key)->firstOrFail();
          $quantity[ucfirst($treatment->id)] = $value;
          unset($quantity[$key]);
      }

      $date->treatments()->sync($quantity);
      $date = Carbon::today()->toDateString();
      $users = User::all();
      $clients = Client::all();
      return view('dates.index',compact('dates','date','users','clients'));

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
