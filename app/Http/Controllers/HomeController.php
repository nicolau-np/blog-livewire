<?php

namespace App\Http\Controllers;

use App\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $pessoas = Pessoa::all();
            return response(['Status' => 0, 'data' => $pessoas], 200);
        } catch (\Exception $erro) {
            return response()->json(['Status' => "error", 'data' => $erro], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $rules = [
                'nome' => ['required', 'string',],
                'genero' => ['required', 'string',],
                'data_nascimento' => ['required', 'date'],
                'telefone' => ['required', 'integer'],
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json(['Status' => 'validation', 'data' => $validator->errors()], 400);
            }

            $data = [
                'nome' => $request->nome,
                'genero' => $request->genero,
                'data_nascimento' => $request->data_nascimento,
                'telefone' => $request->telefone,
            ];

            if (Pessoa::create($data)) {
                return response()->json(['Status' => 0, 'data' => "Feito com sucesso"], 200);
            }
        } catch (\Exception $erro) {
            return response()->json(['Status' => "error", 'data' => $erro], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $pessoa = Pessoa::find($id);
            if (!$pessoa) {
                return response()->json(['Status' => "not_found", 'data' => "Não encontrou ticket"], 404);
            }
            return response(['Status' => 0, 'data' => $pessoa], 200);
        } catch (\Exception $erro) {
            return response()->json(['Status' => "error", 'data' => $erro], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $pessoa = Pessoa::find($id);
            if (!$pessoa) {
                return response()->json(['Status' => "not_found", 'data' => "Não encontrou ticket"], 404);
            }

            $rules = [
                'nome' => ['required', 'string',],
                'genero' => ['required', 'string',],
                'data_nascimento' => ['required', 'date'],
                'telefone' => ['required', 'integer'],
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json(['Status' => 'validation', 'data' => $validator->errors()], 400);
            }

            $data = [
                'nome' => $request->nome,
                'genero' => $request->genero,
                'data_nascimento' => $request->data_nascimento,
                'telefone' => $request->telefone,
            ];


            if (Pessoa::find($id)->update($data)) {
                return response()->json(['Status' => 0, 'data' => "Actualizado com sucesso"], 200);
            }
        } catch (\Exception $erro) {
            return response()->json(['Status' => "error", 'data' => $erro], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $pessoa = Pessoa::find($id);
            if (!$pessoa) {
                return response()->json(['Status' => "not_found", 'data' => "Não encontrou ticket"], 404);
            }


            if (Pessoa::find($id)->delete()) {
                return response()->json(['Status' => 0, 'data' => "Eliminado com sucesso"], 200);
            }
        } catch (\Exception $erro) {
            return response()->json(['Status' => "error", 'data' => $erro], 500);
        }
    }
}