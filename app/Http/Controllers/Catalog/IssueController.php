<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalog\StoreIssueRequest;
use App\Http\Requests\Catalog\UpdateIssueRequest;
use App\Models\Catalog\Issue;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $issues = Issue::all();
        return response(['data' => $issues]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIssueRequest $request)
    {
        try {
            $issue = Issue::create($request->validated());
            return response([
                'message' => 'Categoría creada exitosamente',
                'data' => $issue
            ]);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Error al crear la categoría',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Issue $issue)
    {
        return response(['data' => $issue]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIssueRequest $request, Issue $issue)
    {
        try {
            $issue->update($request->validated());
            return response([
                'message' => 'Categoría actualizada exitosamente',
                'data' => $issue
            ]);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Error al actualizar la categoría',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Issue $issue)
    {
        try {
            $issue->delete();
            return response([
                'message' => 'Categoría eliminada exitosamente',
            ]);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Error al eliminar la categoría',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
