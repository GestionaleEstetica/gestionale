<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Treatment;

class TreatmentsController extends Controller
{

    public function index()
    {
      $treatments = Treatment::orderBy('id')->simplePaginate(20);
      return view('treatments.index', compact('treatments'));
    }

    public function create()
    {
        return view('treatments.create');
    }

    public function store(Request $request)
    {
        Treatment::create($request->all());
        $treatments = Treatment::orderBy('id')->simplePaginate(20);
        return view('treatments.index', compact('treatments'))->with('success','Trattamento aggiunto con successo');
    }

    public function edit($id)
    {
      $treatment = Treatment::findOrFail($id);
      return view('treatments.edit', compact('treatment'));
    }

    public function update(Request $request, $id)
    {
        Treatment::findOrFail($id)->update($request->all());
        $treatments = Treatment::orderBy('id')->simplePaginate(20);
        return view('treatments.index', compact('treatments'))->with('success','Trattamento modificato con successo');
    }

    public function destroy($id)
    {
        Treatment::destroy($id);
        $treatments = Treatment::orderBy('id')->simplePaginate(20);
        return view('treatments.index', compact('treatments'))->with('success','Trattamento eliminato con successo');
    }

    public function search()
    {
        $search = \Request::get('value');
        $treatments =
        Treatment::where('name','like','%'.$search.'%')
        ->orderBy('id')
        ->paginate(10);
        return view('/treatments.index', compact('treatments'));
    }
}
