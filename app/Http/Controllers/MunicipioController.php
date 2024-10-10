<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$municipios = Municipio::all();
        $municipios = DB::table('tb_municipio')
           ->join('tb_departamento', 'tb_municipio.depa_codi', '=' , 'tb_departamento.depa_codi')
           ->select('tb_municipio.*' , "tb_departamento.depa_nomb")
           ->get();
        return view('municipio.index', ['municipios' => $municipios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = DB::table('tb_departamento')
            ->orderBy('depa_nomb')
            ->get();
        return view('municipio.new', ['departamentos' => $departamentos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $municipio = new Municipio();

        $municipio->muni_nomb = $request->name;
        $municipio->depa_codi = $request->code;
        $municipio->save();

        $municipios = DB::table('tb_municipio')
        ->join('tb_departamento', 'tb_municipio.depa_codi', '=' , 'tb_departamento.depa_codi')
        ->select('tb_municipio.*' , "tb_departamento.depa_nomb")
        ->get();

        return view('municipio.index', ['municipios' => $municipios]);

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
        $municipio = Municipio::find($id);
        $departamentos = DB::table('tb_departamento')
        ->orderBy('depa_nomb')
        ->get();

        return view ('municipio.edit' , ['municipio' => $municipio, 'departamentos' => $departamentos]);
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
        $municipio = Municipio::find($id);

        $municipio->muni_nomb = $request->name;
        $municipio->depa_codi = $request->code;
        $municipio->save();

        $municipios = DB::table('tb_municipio')
        ->join('tb_departamento', 'tb_municipio.depa_codi', '=' , 'tb_departamento.depa_codi')
        ->select('tb_municipio.*', 'tb_departamento.depa_nomb')
        ->get();

        return view ('municipio.index' , ['municipios' => $municipios]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $municipio = Municipio::find($id);
        $municipio->delete();

        $municipios = DB::table('tb_municipio')
        ->join('tb_departamento', 'tb_municipio.depa_codi', '=' , 'tb_departamento.depa_codi')
        ->select('tb_municipio.*', 'tb_departamento.depa_nomb')
        ->get();

        return view ('municipio.index' , ['municipios' => $municipios]);
    }
}
