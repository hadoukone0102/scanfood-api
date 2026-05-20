<?php

namespace Modules\Menu\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;        
use Illuminate\Http\Response;            
use Modules\Menu\Http\Requests\RepasRequest; 
use Modules\Menu\Models\Repas;   

class RepasController extends Controller
{
    /**
     * Liste tous les repas
     */
    public function index(): JsonResponse
    {
        $repas = Repas::latest()->paginate(15);

        return response()->json($repas);
    }

    /**
     * Créer un repas
     */
   public function store(RepasRequest $request): JsonResponse
{
    $repas = Repas::create($request->validated());

    return response()->json([
        'message' => 'Repas créé avec succès',
        'data'    => $repas
    ], Response::HTTP_CREATED);
}

    /**
     * Afficher un repas
     */
    public function show(Repas $repas): JsonResponse
    {
        return response()->json($repas);
    }

    /**
     * Modifier un repas
     */
   public function update(RepasRequest $request, Repas $repas): JsonResponse
{
    $repas->update($request->validated());

    return response()->json([
        'message' => 'Repas modifié avec succès',
        'data'    => $repas->fresh()
    ]);
}

    /**
     * Supprimer un repas
     */
   public function destroy(Repas $repas): JsonResponse
{
    $repas->delete();

    return response()->json([
        'message' => 'Repas supprimé avec succès'
    ], Response::HTTP_OK);
}
}