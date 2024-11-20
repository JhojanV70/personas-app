<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Municipio;
use Illuminate\Support\Facades\Validator;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $municipios = DB::table('tb_municipio')
        ->orderBy('muni_nomb')
        ->get();
        return response()->json(['municipios' => $municipios], 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'muni_nomb' => ['required', 'max:50', 'unique:tb_municipio,muni_nomb'],
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'Se produjo un error en la validación de la información',
                'statusCode' => 400
            ]);
        }

        $municipio = new Municipio();
        $municipio->muni_nomb = $request->muni_nomb;
        $municipio->save();

        return response()->json(['municipio' => $municipio], 201, [], JSON_PRETTY_PRINT);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $municipio = Municipio::find($id);
        if (is_null($municipio)) {
            return abort(404);
        }

        return response()->json(['municipio' => $municipio], 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(), [
            'muni_nomb' => ['required', 'max:50', 'unique:tb_municipio,muni_nomb,' . $id . ',muni_codi'],
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'Se produjo un error en la validación de la información',
                'statusCode' => 400
            ]);
        }

        $municipio = Municipio::find($id);
        if (is_null($municipio)) {
            return abort(404);
        }

        $municipio->muni_nomb = $request->muni_nomb;
        $municipio->save();

        return response()->json(['municipio' => $municipio], 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $municipio = Municipio::find($id);
        if (is_null($municipio)) {
            return abort(404);
        }

        $municipio->delete();

        $municipios = DB::table('tb_municipio')
            ->orderBy('muni_nomb')
            ->get();

        return response()->json(['municipios' => $municipios, 'success' => true], 200, [], JSON_PRETTY_PRINT);
    }
}
