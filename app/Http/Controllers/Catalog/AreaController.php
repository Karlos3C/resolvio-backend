<?php

namespace App\Http\Controllers\Catalog;

use App\Models\Catalog\Area;
use App\Http\Controllers\Controller;
use App\Http\Requests\Catalog\StoreAreaRequest;
use App\Http\Requests\Catalog\UpdateAreaRequest;

class AreaController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $areas = Area::all();
        return response(['data' => $areas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAreaRequest $request)
    {
        try {
            $area = Area::create($request->validated());
            return response([
                'message' => 'Área creada exitosamente',
                'data' => $area
            ]);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Error al crear el área',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Area $area)
    {
        return response(['data' => $area]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAreaRequest $request, Area $area)
    {
        try {
            $area->update($request->validated());
            return response([
                'message' => 'Área actualizada exitosamente',
                'data' => $area
            ]);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Error al actualizar el área',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Area $area)
    {
        try {
            $area->delete();
            return response([
                'message' => 'Área eliminada exitosamente'
            ]);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Error al eliminar el área',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
