<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\carros;

class CarroController extends Controller
{
    // Mostrar todos os registros da tabela de carros
    public function index()
    {
        $regCarro = carros::all();
        $contador = $regCarro->count();

        return 'Carros: ' . $contador . $regCarro . response()->json([], Response::HTTP_NO_CONTENT);
    }

    // Mostrar um tipo de registro específico
    public function show(string $id)
    {
        $regCarro = carros::find($id);

        if ($regCarro) {
            return 'Carro Localizado: ' . $regCarro . response()->json([], Response::HTTP_NO_CONTENT);
        } else {
            return 'Carro não localizado.' . response()->json([], Response::HTTP_NO_CONTENT);
        }
    }

    // Cadastrar registros
    public function store(Request $request)
    {
        $regCarro = $request->all();

        $regVerify = Validator::make($regCarro, [
            'Marca' => 'required',
            'Modelo' => 'required',
            'Ano' => 'required|numeric',
            'Preço' => 'required|numeric',
            'cor_id' => 'required|exists:cores_cars,id',
        ]);

        if ($regVerify->fails()) {
            return 'Registros inválidos: ' . response()->json([], Response::HTTP_NO_CONTENT);
        }

        $regCarroCad = carros::create($regCarro);

        if ($regCarroCad) {
            return 'Carro Cadastrado: ' . response()->json([], Response::HTTP_NO_CONTENT);
        } else {
            return 'Carro não cadastrado: ' . response()->json([], Response::HTTP_NO_CONTENT);
        }
    }

    // Alterar registros
    public function update(Request $request, string $id)
    {
        $regCarro = $request->all();

        $regVerify = Validator::make($regCarro, [
            'Marca' => 'required',
            'Modelo' => 'required',
            'Ano' => 'required|numeric',
            'Preço' => 'required|numeric',
            'cor_id' => 'required|exists:cores_cars,id',
        ]);

        if ($regVerify->fails()) {
            return 'Registros não atualizados: ' . response()->json([], Response::HTTP_NO_CONTENT);
        }

        $regCarroBanco = carros::find($id);

        if ($regCarroBanco) {
            $regCarroBanco->Marca = $regCarro['Marca'];
            $regCarroBanco->Modelo = $regCarro['Modelo'];
            $regCarroBanco->Ano = $regCarro['Ano'];
            $regCarroBanco->Preço = $regCarro['Preço'];
            $regCarroBanco->cor_id = $regCarro['cor_id'];

            $retorno = $regCarroBanco->save();

            if ($retorno) {
                return "Carro atualizado com sucesso" . response()->json([], Response::HTTP_NO_CONTENT);
            } else {
                return "Erro: Carro não atualizado!" . response()->json([], Response::HTTP_NO_CONTENT);
            }
        }

        return "Carro não encontrado." . response()->json([], Response::HTTP_NO_CONTENT);
    }

    // Deletar os registros
    public function destroy(string $id)
    {
        $regCarro = carros::find($id);

        if ($regCarro) {
            if ($regCarro->delete()) {
                return "O carro foi deletado com sucesso" . response()->json([], Response::HTTP_NO_CONTENT);
            }
        }

        return "Algo deu errado: Carro não deletado." . response()->json([], Response::HTTP_NO_CONTENT);
    }
}
