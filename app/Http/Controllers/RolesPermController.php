<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoles_PermRequest;
use App\Http\Requests\UpdateRoles_PermRequest;
use App\Http\Services\ResponseService;
use App\Models\Types_user;

class RolesPermController extends Controller
{
    /**
     * Liste tous les groupes avec leurs permissions
     */
    public function index()
    {
        $roles = Types_user::with('perms')->get();

        return response()->json([
            'success' => true,
            'message' => 'Liste des groupes de permissions',
            'data'    => $roles->map(fn($role) => $this->formatRole($role)),
        ]);
    }

    /**
     * Créer un nouveau groupe (avec permissions optionnelles)
     */
    public function store(StoreRoles_PermRequest $request)
    {
        $role = Types_user::create([
            'labelle'     => $request->labelle,
            'description' => $request->description,
        ]);

        if(!$role){return ResponseService::validationError($role);}

        // Attacher les permissions si fournies
        if ($request->filled('perms')) {
            $role->perms()->attach($request->perms);
        }

        $role->load('perms');

        return response()->json([
            'success' => true,
            'message' => 'Groupe créé avec succès',
            'data'    => $this->formatRole($role),
        ], 201);
    }

    /**
     * Afficher un groupe avec ses permissions
     */
    public function show($id)
    {
        $role = Types_user::with('perms')->findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Détail du groupe',
            'data'    => $this->formatRole($role),
        ]);
    }

    /**
     * Mettre à jour un groupe et/ou ses permissions
     */
    public function update(UpdateRoles_PermRequest $request, $id)
    {
        $role = Types_user::findOrFail($id);

        $role->update($request->only(['labelle', 'description']));

        // sync() remplace toutes les permissions par les nouvelles
        if ($request->has('perms')) {
            $role->perms()->sync($request->perms ?? []);
        }

        $role->load('perms');

        return response()->json([
            'success' => true,
            'message' => 'Groupe mis à jour avec succès',
            'data'    => $this->formatRole($role),
        ]);
    }

    /**
     * Supprimer un groupe (et détacher ses permissions automatiquement)
     */
    public function destroy($id)
    {
        $role = Types_user::findOrFail($id);
        $role->perms()->detach(); // Nettoyer la table pivot
        $role->delete();

        return response()->json([
            'success' => true,
            'message' => 'Groupe supprimé avec succès',
        ]);
    }

    /**
     * Formater la réponse JSON du rôle
     */
    private function formatRole(Types_user $role): array
    {
        return [
            'id'          => $role->id,
            'title'       => $role->labelle,
            'description' => $role->description,
            'perms'       => $role->perms->map(fn($p) => [
                'id'   => $p->id,
                'code' => $p->code,
                'desc' => $p->desc,
            ])->toArray(),
        ];
    }
}