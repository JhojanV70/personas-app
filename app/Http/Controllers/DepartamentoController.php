<?php

namespace App\Http\Controllers;

use App\Models\departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos=departamento::all();
        return view('departamentos.index', ['departamentos' => $departamentos ]);
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
        return view('departamentos.new', ['departamentos'=>$departamentos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $departamento = new departamento();
        $departamento->depa_nomb=$request->name;
        $departamento->pais_codi=$request->code;   
        $departamento->save();
 
        $departamentos = DB::table('tb_departamento')
        ->join('tb_pais','tb_departamento.pais_codi', '=','tb_pais.pais_codi')
        ->select('tb_departamento.*',"tb_pais.pais_nomb")
        ->get();
        return view('departamentos.index', ['departamentos' => $departamentos]);
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
