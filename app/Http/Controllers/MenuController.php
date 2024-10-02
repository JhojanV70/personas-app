<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipio;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index()
    {
        $municipios = Municipio::all();
        return view('municipios.menu', ['municipios' => $municipios]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $municipio = new Municipio();
        $municipio->fill($request->all());
        $municipio->save();
        
        return redirect()->route('municipios.index');
    }

    public function show($id)
    {
        $municipio = Municipio::findOrFail($id);
        return view('municipios.show', ['municipio' => $municipio]);
    }

    public function edit($id)
    {
        $municipio = Municipio::findOrFail($id);
        return view('municipios.edit', ['municipio' => $municipio]);
    }

    public function update(Request $request, $id)
    {
        $municipio = Municipio::findOrFail($id);
        $municipio->fill($request->all());
        $municipio->save();
        
        return redirect()->route('municipios.index');
    }

    public function destroy($id)
    {
        $municipio = Municipio::findOrFail($id);
        $municipio->delete();
        
        return redirect()->route('municipios.index');
    }
}