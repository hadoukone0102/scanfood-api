<?php

namespace App\Http\Controllers\TypesController;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTypes_userRequest;
use App\Models\Types_user;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\TypeUsersResource;
use App\Http\Services\ResponseService;

class TypesUserController extends Controller
{
    public function index()
    {
        $Liste_Type_User = Types_user::all();
        return ResponseService::success(
            "Liste recupérer avec succès",
            $Liste_Type_User
        );
    }

    public function store(StoreTypes_userRequest $request)
    {
        $user_type = $request->validated();
        $create_action = Types_user::create($user_type);
        if(!$create_action){
            return response()->json([
                'success' => false,
                "message" => "Une erreur est survenue lors de la creation du type",
                "code" => 500,
                'data' => $user_type
            ],500);
        }
        return response()->json([
            'muccess' => true,
            "message" => "Type créer avec succès",
            "code" => 200,
            'data' => $user_type
        ],200);
    }

    public function show(Types_user $id): JsonResponse
    {
        $type = new TypeUsersResource($id);

        return ResponseService::success(
            "Type récupéré avec succès",
            $type
        );
    }

}
