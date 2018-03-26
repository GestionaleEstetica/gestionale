<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Treatment;

class TreatmentsController extends Controller
{

    public function index()
    {
      $treatments = Treatment::orderBy('name')->simplePaginate(20);
      return view('treatments.index', compact('treatments'));
    }

    public function create()
    {
        return view('treatments.create');
    }

    public function store(Request $request)
    {
        Treatment::create($request->all());
        return redirect('/treatments');
    }

    public function edit($id)
    {
      $treatment = Treatment::findOrFail($id);
      return view('treatments.edit', compact('treatment'));
    }

    public function update(Request $request, $id)
    {
        Treatment::findOrFail($id)->update($request->all());
        return back();
    }

    public function destroy($id)
    {
        Treatment::destroy($id);
        return back();
    }
}
