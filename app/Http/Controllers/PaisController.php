<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaisController extends Controller
{
    public function index()
    {
        $paises = Pais::all();
        return view('paises.index', ['paises' => $paises]);
    }

    public function create()
    {
        $paises = DB::table('tb_pais')
            ->orderBy('pais_nomb')
            ->get();
        return view('paises.new', ['paises' => $paises]);
    }

    public function store(Request $request)
    {
        $pais = new Pais();
        $pais->pais_nomb = $request->name;
        $pais->pais_capi = $request->code; 
        $pais->save();

        $paises = DB::table('tb_pais')
            ->select('tb_pais.*')
            ->get();
        return view('paises.index', ['paises' => $paises]);
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $pais = Pais::find($id);
        $paises = DB::table('tb_pais')
            ->orderBy('pais_nomb')
            ->get();
        return view('paises.edit', ['pais' => $pais, 'paises' => $paises]);
    }

    public function update(Request $request, $id)
    {
        $pais = Pais::find($id);
        $pais->pais_nomb = $request->name;
        $pais->pais_capi = $request->code;
        $pais->save();

        $paises = DB::table('tb_pais')
            ->select('tb_pais.*')
            ->get();
        return view('paises.index', ['paises' => $paises]);
    }

    public function destroy($id)
    {
        $pais = Pais::find($id);
        $pais->delete();

        $paises = DB::table('tb_pais')
            ->select('tb_pais.*')
            ->get();
        return view('paises.index', ['paises' => $paises]);
    }
}