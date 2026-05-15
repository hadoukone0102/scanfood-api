<?php

namespace App\Http\Controllers;

use App\Http\Services\ResponseService;
use App\Models\Permissions;
use App\Http\Requests\StorePermissionsRequest;
use App\Http\Requests\UpdatePermissionsRequest;
use PermsResouce;

class PermissionsController extends Controller
{
    public function index()
    {
        $liste_perms = Permissions::all();
        return ResponseService::success("Liste des permissions",$liste_perms);
    }

    public function store(StorePermissionsRequest $request)
    {
        $perm = $request->validated();
        $action = Permissions::create($perm);
        if(!$action) return ResponseService::validationError($action);
        return ResponseService::success("Permission créer avec succès",$action);
    }

    public function show(Permissions $permissions)
    {
        $perm = new PermsResouce($permissions);
        return ResponseService::success("Permission récupérer avec succès",$perm);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePermissionsRequest $request, Permissions $permissions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permissions $permissions)
    {
        //
    }
}
