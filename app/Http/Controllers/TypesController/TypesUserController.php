<?php

namespace App\Http\Controllers\TypesController;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTypes_userRequest;
use App\Http\Requests\UpdateTypes_userRequest;
use App\Models\Types_user;
use Illuminate\Http\JsonResponse;
use TypeUsersResource;

class TypesUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Liste_Type_User = Types_user::all();
        return response()->json([
            "Success" => true,
            "Message" => "Liste des users type",
            "data" => $Liste_Type_User
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypes_userRequest $request)
    {
        $user_type = $request->validated();
        $create_action = Types_user::create($user_type);
        if(!$create_action){
            return response()->json([
                'Success' => false,
                "Message" => "Une erreur est survenue lors de la creation du type",
                "Code" => 500,
                'data' => $user_type
            ],500);
        }
        return response()->json([
            'Success' => true,
            "Message" => "Une erreur est survenue lors de la creation du type",
            "Code" => 200,
            'data' => $user_type
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Types_user $types_user):JsonResponse
    {
        //
        $type = new TypeUsersResource($types_user);
        if(!$type) return response()->json(["success"=>false,"Message" => "Erreur lors de la recupération"]);
        return response()->json([
            "Success" => true,
            "data" => $type,
            "Message" => "Liste de type d'utilisateur"
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Types_user $types_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypes_userRequest $request, Types_user $types_user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Types_user $types_user)
    {
        //
    }
}
