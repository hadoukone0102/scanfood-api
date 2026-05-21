<?php

namespace Modules\Menu\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Modules\Menu\Http\Requests\TypeMenuRequest;
use Modules\Menu\Models\TypeMenu;
class TypeMenuController extends Controller
{
    /**
     * Liste tous les types de menu
     */
    public function index(): JsonResponse
    {
        $typeMenus = TypeMenu::latest()->paginate(15);

        return response()->json($typeMenus);
    }

    /**
     * Créer un type de menu
     */
    public function store(TypeMenuRequest $request): JsonResponse
    {
        $typeMenu = TypeMenu::create($request->validated());

        return response()->json([
            'message' => 'Type de menu créé avec succès',
            'data'    => $typeMenu
        ], Response::HTTP_CREATED);
    }

    /**
     * Afficher un type de menu
     */
    public function show(TypeMenu $typeMenu): JsonResponse
    {
        return response()->json($typeMenu);
    }

    /**
     * Modifier un type de menu
     */
    public function update(TypeMenuRequest $request, TypeMenu $typeMenu): JsonResponse
    {
        $typeMenu->update($request->validated());

        return response()->json([
            'message' => 'Type de menu modifié avec succès',
            'data'    => $typeMenu->fresh()
        ]);
    }

    /**
     * Supprimer un type de menu
     */
    public function destroy(TypeMenu $typeMenu): JsonResponse
    {
        $typeMenu->delete();

        return response()->json([
            'message' => 'Type de menu supprimé avec succès'
        ]);
    }
}