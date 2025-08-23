<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/test-db', function () {
    try {
        \DB::connection()->getPdo();
        return response()->json(['message' => 'Conexão com o banco de dados Neon estabelecida com sucesso!']);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Erro ao conectar: ' . $e->getMessage()], 500);
    }
});
