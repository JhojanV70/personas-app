<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Departamento;
use Illuminate\Support\Facades\Validator;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departamentos = DB::table('tb_departamento')
            ->orderBy('depa_nomb')
            ->get();
        return response()->json(['departamentos' => $departamentos], 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'depa_nomb' => ['required', 'max:50', 'unique:tb_departamento,depa_nomb'],
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'Se produjo un error en la validación de la información',
                'statusCode' => 400
            ]);
        }

        $departamento = new Departamento();
        $departamento->depa_nomb = $request->depa_nomb;
        $departamento->save();

        return response()->json(['departamento' => $departamento], 201, [], JSON_PRETTY_PRINT);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $departamento = Departamento::find($id);
        if (is_null($departamento)) {
            return abort(404);
        }

        return response()->json(['departamento' => $departamento], 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(), [
            'depa_nomb' => ['required', 'max:50', 'unique:tb_departamento,depa_nomb,' . $id . ',depa_codi'],
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'Se produjo un error en la validación de la información',
                'statusCode' => 400
            ]);
        }

        $departamento = Departamento::find($id);
        if (is_null($departamento)) {
            return abort(404);
        }

        $departamento->depa_nomb = $request->depa_nomb;
        $departamento->save();

        return response()->json(['departamento' => $departamento], 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $departamento = Departamento::find($id);
        if (is_null($departamento)) {
            return abort(404);
        }

        $departamento->delete();

        $departamentos = DB::table('tb_departamento')
            ->orderBy('depa_nomb')
            ->get();

        return response()->json(['departamentos' => $departamentos, 'success' => true], 200, [], JSON_PRETTY_PRINT);
    }
}
