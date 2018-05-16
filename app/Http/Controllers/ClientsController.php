<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderBy('first_name')->simplePaginate(15);
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Client::create($request->all());
        $clients = Client::orderBy('first_name')->simplePaginate(15);
        return view('clients.index', compact('clients'))->with('success','Cliente aggiunto con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.show', compact('client'));
    }

    public function showDates($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.showDates', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
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
      Client::findOrFail($id)->update($request->all());
      $clients = Client::orderBy('first_name')->simplePaginate(15);
      return view('clients.index', compact('clients'))->with('success','Cliente modificato con successo');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Client::destroy($id);

      $clients = Client::orderBy('first_name')->simplePaginate(15);
      return view('clients.index', compact('clients'))->with('success','Cliente rimosso con successo');
    }

    public function recent()
    {
        $clients = Client::orderBy('created_at','desc')->simplePaginate(15);
        return view('clients.index', compact('clients'));
    }

    public function search()
    {
        $search = \Request::get('value');
        $clients =
        Client::where('first_name','like','%'.$search.'%')
        ->orWhere('last_name','like','%'.$search.'%')
        ->orderBy('id')
        ->paginate(10);
        return view('/clients.index', compact('clients'));
    }
}
