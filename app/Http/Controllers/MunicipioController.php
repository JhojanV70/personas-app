<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MunicipioController extends Controller
{
    public function index()
    {
        $municipios = Municipio::all();
        return view('municipios.index', ['municipios' => $municipios]);
    }

    public function create()
    {
        $municipios = DB::table('tb_municipio')
        ->orderBy('muni_nomb')
        ->get();
        return view('municipios.new', ['municipios'=>$municipios]);
    }

    public function store(Request $request)
    {
        $municipio = new Municipio();
        $municipio->muni_nomb = $request->name;
        $municipio->depa_codi = $request->code;   
        $municipio->save();

        $municipios = DB::table('tb_municipio')
            ->join('tb_departamento', 'tb_municipio.depa_codi', '=', 'tb_departamento.depa_codi')
            ->select('tb_municipio.*', "tb_departamento.depa_nomb")
            ->get();
        return view('municipios.index', ['municipios' => $municipios]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $municipio = Municipio::find($id);
        $municipios = DB::table('tb_municipio')
            ->orderBy('muni_nomb')
            ->get();
        return view('municipios.edit', ['municipio' => $municipio, 'municipios' => $municipios]);
    }

    public function update(Request $request, $id)
    {
        $municipio = Municipio::find($id);
        $municipio->muni_nomb = $request->name;
        $municipio->depa_codi = $request->code;
        $municipio->save();

        $municipios = DB::table('tb_municipio')
            ->join('tb_departamento', 'tb_municipio.depa_codi', '=', 'tb_departamento.depa_codi')
            ->select('tb_municipio.*', "tb_departamento.depa_nomb")
            ->get();

        return view('municipios.index', ['municipios' => $municipios]);
    }

    public function destroy($id)
    {
        $municipio = Municipio::find($id);
        $municipio->delete();

        $municipios = DB::table('tb_municipio')
            ->join('tb_departamento', 'tb_municipio.depa_codi', '=', 'tb_departamento.depa_codi')
            ->select('tb_municipio.*', "tb_departamento.depa_nomb")
            ->get();
        return view('municipios.index', ['municipios' => $municipios]);
    }
}