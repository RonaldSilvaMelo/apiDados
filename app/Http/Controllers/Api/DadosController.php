<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dados;
use Illuminate\Support\Facades\Validator;

class DadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dadosDados = Dados::all();
        $contador = $dadosDados->count();

        return'Dados Contados: '. $contador.' - '. $dadosDados;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dadosDados = $request->all();
        $validador = Validator::make($dadosDados,[
            'Nome' => 'required',
            'CPF' => 'required'

        ]);

        if($validador->fails()){
            return 'Dados invalidos!'. $validador->erros(true). 500;
        }

        $registrosDados = Balada::create($dadosDados);

        if($registrosDados){
            return'Dados cadastrados com sucesso'. 500;
        }
            else{
            return'Erro ao cadastrar os dados'. 500;
        }    
        
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    
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
