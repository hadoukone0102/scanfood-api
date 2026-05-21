<?php
namespace Modules\Menu\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Modules\Menu\Http\Requests\MenuRequest;
use Modules\Menu\Models\Menu;
class MenuController extends Controller
{
    /**
     * Liste tous les menus
     */
    public function index(): JsonResponse
    {
        $menus = Menu::with('typeMenu')->latest()->paginate(15);

        return response()->json($menus);
    }

    /**
     * Créer un menu
     */
    public function store(MenuRequest $request): JsonResponse
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $uploaded                = cloudinary()->uploadApi()->upload(
                $request->file('photo')->getRealPath(),
                ['folder' => 'menus']
            );
            $data['photo']           = $uploaded['secure_url'];
            $data['photo_public_id'] = $uploaded['public_id'];
        }

        $menu = Menu::create($data);

        return response()->json([
            'message' => 'Menu créé avec succès',
            'data'    => $menu->load('typeMenu')
        ], Response::HTTP_CREATED);
    }

    /**
     * Afficher un menu
     */
    public function show(Menu $menu): JsonResponse
    {
        return response()->json($menu->load('typeMenu'));
    }

    /**
     * Modifier un menu
     */
    public function update(MenuRequest $request, Menu $menu): JsonResponse
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne image sur Cloudinary
            if ($menu->photo_public_id) {
                cloudinary()->uploadApi()->destroy($menu->photo_public_id);
            }

            $uploaded                = cloudinary()->uploadApi()->upload(
                $request->file('photo')->getRealPath(),
                ['folder' => 'menus']
            );
            $data['photo']           = $uploaded['secure_url'];
            $data['photo_public_id'] = $uploaded['public_id'];
        }

        $menu->update($data);

        return response()->json([
            'message' => 'Menu modifié avec succès',
            'data'    => $menu->fresh()->load('typeMenu')
        ]);
    }

    /**
     * Supprimer un menu
     */
    public function destroy(Menu $menu): JsonResponse
    {
        if ($menu->photo_public_id) {
            cloudinary()->uploadApi()->destroy($menu->photo_public_id);
        }

        $menu->delete();

        return response()->json([
            'message' => 'Menu supprimé avec succès'
        ]);
    }
}