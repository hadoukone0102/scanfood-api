<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorepermsRequest;
use App\Http\Requests\UpdatepermsRequest;
use App\Http\Resources\PermsResouce;
use App\Http\Services\ResponseService;
use App\Models\Perm;

class PermsController extends Controller
{
    public function index()
    {
        $liste_perms = Perm::all();
        return ResponseService::success(
            "Liste des permissions",
            PermsResouce::collection($liste_perms)
        );
    }

    public function store(StorepermsRequest $request)
    {
        $perm = $request->validated();
        $action = Perm::create($perm);
        if(!$action) return ResponseService::validationError($action);
        return ResponseService::success("Permission créer avec succès",$action);
    }

    public function show(Perm $permissions)
    {
        $perm = new PermsResouce($permissions);
        return ResponseService::success("Permission récupérer avec succès",$perm);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepermsRequest $request, Perm $permissions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perm $permissions)
    {
        //
    }
}
