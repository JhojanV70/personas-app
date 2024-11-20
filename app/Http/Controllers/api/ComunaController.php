<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Comuna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator; 


class ComunaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $comunas = DB::table('tb_comuna')
            ->join('tb_municipio', 'tb_comuna.muni_codi', '=', 'tb_municipio.muni_codi')
            ->select('tb_comuna.*', "tb_municipio.muni_nomb")
            ->get();
        return response()->json(['comunas' => $comunas], 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'comu_nomb' => ['required', 'max:30', 'unique'],
            'muni_codi' => ['required', 'numeric', 'min:1']
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'Se produjo un error en la validación de la información',
                'statusCode' => 400
            ]);
        }
        $comuna = new Comuna();
        $comuna->comu_nomb = $request->comu_nomb;
        $comuna->muni_codi = $request->muni_codi;
        $comuna->save();
        return response()->json(['comunas' => $comuna], 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Display the specified resource.
     * @return Illuminate\Http\Response
     * 
     */
    public function show(string $id)
    {
        $comuna = Comuna::find($id);
        if (is_null($comuna)) {
            return abort(404);
        }
        $municipios = DB::table('tb_municipio')
            ->orderBy('muni_nomb')
            ->get();
        return response()->json(['comunas' => $comuna, 'municipios' => $municipios], 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(), [
            'comu_nomb' => ['required', 'max:30', 'unique'],
            'muni_codi' => ['required', 'numeric', 'min:1']
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'Se produjo un error en la validación de la información',
                'statusCode' => 400
            ]);
        }
        $comuna = Comuna::find($id);
        if (is_null($comuna)) {
            return abort(404);
        }
        $comuna->comu_nomb = $request->comu_nomb;
        $comuna->muni_codi = $request->muni_codi;
        $comuna->save();
        return response()->json(['comunas' => $comuna], 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comuna = Comuna::find($id);
        if (is_null($comuna)) {
            return abort(404);
        }
        $comuna->delete();
        $comunas = DB::table('tb_comuna')
            ->join('tb_municipio', 'tb_comuna.muni_codi', '=', 'tb_municipio.muni_codi')
            ->select('tb_comuna.*', "tb_municipio.muni_nomb")
            ->get();
        return response()->json(['comunas' => $comunas, 'success' => true], 200, [], JSON_PRETTY_PRINT);
    }
}
