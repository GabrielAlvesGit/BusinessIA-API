<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * ======== Listar todos os usuários ========
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users, 200);
    }

    /**
     * Store a newly created resource in storage.
     * ======== Cadastro do usuário ========
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

       try {
        $user = new User();
        $user->fill($data);
        dd($user); 
        return response()->json($user, 201);
        dd($user);
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Erro ao criar usuário',
                'error' => $ex->getMessage()
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     * ======== Listar o usuário por {id} ========
     */
    public function show(string $id)
    {
        try {
            $user = User::findOrfail($id);
            return response()->json($user, 200);
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'User not found',
                'error' => $ex->getMessage()
            ], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
