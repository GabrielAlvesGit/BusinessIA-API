<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * ======== Listar todos os usuários ========
     */
public function index(Request $request)
{
    $currentPage = $request->get('current_page') ?? 1;
    $regsPerPage = 3;
    $skip = ($currentPage - 1) * $regsPerPage;
    $users = User::skip($skip)->take($regsPerPage)->orderByDesc('id')->get();
    return new \App\Http\Resources\UserCollection($users);
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
        $user->password = Hash::make(123);
        $user->save();

        // dd($user);  // Para verificar se os dados estão corretos antes de salvar
        return response()->json($user->toResource(), 201);
        dd($user);
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Falha ao inserir usuário',
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
            return response()->json($user->toResource(), 200);
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
    public function update(UpdateUserRequest $request, string $id)
    {
        $data = $request->validated();

        try {
            $user = User::findOrFail($id);
            $user->update($data);

            return response()->json($user->toResource(), 200);
            dd($user);
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Falha ao alterar o usuário',
                'error' => $ex->getMessage()
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {
            $removed = User::destroy($id);
            if (!$removed) {
                return response()->json(['message' => 'Usuário não encontrado ou já foi deletado'], 404);
            }
            return response()->json(null, 204);
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Falha ao remover o usuário',
                'error' => $ex->getMessage()
            ], 400);
        }
    }
}
