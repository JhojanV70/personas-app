<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::all();
        return view('departamentos.index', ['departamentos' => $departamentos]);
    }

    public function create()
    {
        $departamentos = DB::table('tb_departamento')
            ->orderBy('depa_nomb')
            ->get();
        return view('departamentos.new', ['departamentos' => $departamentos]);
    }

    public function store(Request $request)
    {
        $departamento = new Departamento();
        $departamento->depa_nomb = $request->name;
        $departamento->pais_codi = $request->code;   
        $departamento->save();

        $departamentos = DB::table('tb_departamento')
            ->join('tb_pais', 'tb_departamento.pais_codi', '=', 'tb_pais.pais_codi')
            ->select('tb_departamento.*', "tb_pais.pais_nomb")
            ->get();
        return view('departamentos.index', ['departamentos' => $departamentos]);
    }

    public function edit($id)
    {
        $departamento = Departamento::find($id);
        $departamentos = DB::table('tb_departamento')
            ->orderBy('depa_nomb')
            ->get();
        return view('departamentos.edit', ['departamento' => $departamento, 'departamentos' => $departamentos]);
    }

    public function update(Request $request, $id)
    {
        $departamento = Departamento::find($id);
        $departamento->depa_nomb = $request->name;
        $departamento->pais_codi = $request->code;
        $departamento->save();

        $departamentos = DB::table('tb_departamento')
            ->join('tb_pais', 'tb_departamento.pais_codi', '=', 'tb_pais.pais_codi')
            ->select('tb_departamento.*', "tb_pais.pais_nomb")
            ->get();
        return view('departamentos.index', ['departamentos' => $departamentos]);
    }

    public function destroy($id)
    {
        $departamento = Departamento::find($id);
        $departamento->delete();

        $departamentos = DB::table('tb_departamento')
            ->join('tb_pais', 'tb_departamento.pais_codi', '=', 'tb_pais.pais_codi')
            ->select('tb_departamento.*', "tb_pais.pais_nomb")
            ->get();
        return view('departamentos.index', ['departamentos' => $departamentos]);
    }
}