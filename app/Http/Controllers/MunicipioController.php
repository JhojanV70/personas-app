<?php

namespace App\Http\Controllers;

use App\Models\departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $municipios=municipio::all();
       $municipios = DB::table('tb_municipio')
       ->join('tb_departamento', 'tb_municipio.depa_codi', '=' , 'tb_departamento.depa_codi')
       ->select('tb_municipio.*', "tb_departamento.depa_nomb")
       ->get();
       return view('municipios.index', ['municipios' => $municipios ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $municipios = DB::table('tb_municipio')
        ->orderBy('muni_nomb')
        ->get();
        return view('municipios.new', ['municipios'=>$municipios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /* $comuna = new departamento();
        $comuna->comu_nomb=$request->name;
        $comuna->muni_codi=$request->code;   
        $comuna->save();
 
        $comunas = DB::table('tb_comuna')
        ->join('tb_municipio', 'tb_comuna.muni_codi', '=', 'tb_municipio.muni_codi')
        ->select('tb_comuna.*',"tb_municipio.muni_nomb")
        ->get();
        return view('comunas.index', ['comunas' => $comunas]);*/
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
       /* $comuna=Comuna::find($id);
        $municipios=DB::table('tb_municipio')
        ->orderBy('muni_nomb')
        ->get();
        return view('comunas.edit',['comuna' => $comuna, 'municipios' => $municipios]);*/
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
        /*$comuna = Comuna::find($id);

        $comuna->comu_nomb = $request->name;
        $comuna->muni_codi = $request->code;
        $comuna->save();

        $comunas = DB::table('tb_comuna')
        ->join('tb_municipio', 'tb_comuna.muni_codi', '=' ,'tb_municipio.muni_codi')
        ->select('tb_comuna.*', "tb_municipio.muni_nomb")
        ->get();

        return view('comunas.index',['comunas' => $comunas]);*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       /* $comuna = Comuna::find($id);
        $comuna->delete();

        $comunas = DB::table('tb_comuna')
        ->join('tb_municipio', 'tb_comuna.muni_codi', '=', 'tb_municipio.muni_codi')
        ->select('tb_comuna.*', 'tb_municipio.muni_nomb')
        ->get();

        return view('comunas.index', ['comunas'  => $comunas]);*/
    }
}
