<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::where('user_id', Auth::id())->get()->toArray();
        return view('pages.user-services.index', ['services' => $services]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|numeric|min:1'
        ]);

        try {
            $service = [
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'user_id' => Auth::id()
            ];
            $serviceCreated = Service::create($service);
            if (!$serviceCreated) {
                throw new Exception("Erro ao processar solicitação", 1);
            }
            $serviceCreated['status'] = 'active';

            return response()->json(
                [
                    'message' => 'Serviço criado com sucesso',
                    'data' => $serviceCreated
                ],
                200,
                [],
                JSON_UNESCAPED_UNICODE
            );
        } catch (Exception $error) {
            return response()->json(
                ['message' => $error->getMessage()],
                400,
                [],
                JSON_UNESCAPED_UNICODE
            );
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            "name" => "nullable|min:3",
            "price" => "nullable|numeric"
        ]);

        try {

            $service = Service::find($id);
            if (!$service) {
                throw new Exception("Serviço não encontrado", 1);
            }

            $serviceUpdate = [
                "name" => $request->input('name') ?? $service['name'],
                "price" => $request->input('price') ?? $service['price']
            ];

            $serviceUpdated = $service->update($serviceUpdate);
            if (!$serviceUpdated) {
                throw new Exception("Serviço não foi atualizado", 1);
            }

            return response()->json(
                [
                    'message' => 'Serviço atualizado com sucesso',
                    'data' => $serviceUpdate
                ],
                200,
                [],
                JSON_UNESCAPED_UNICODE
            );
        } catch (Exception $error) {
            dd($error);
            return response()->json(
                ['message' => $error->getMessage()],
                400,
                [],
                JSON_UNESCAPED_UNICODE
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $service = Service::find($id);
            $serviceDeleted = $service->delete();
            if (!$serviceDeleted) {
                throw new Exception("Erro ao processar solicitação", 1);
            }

            return response()->json(
                [
                    'message' => 'Serviço deletado com sucesso',
                    'data' => ['id' => $id],
                ],
                200,
                [],
                JSON_UNESCAPED_UNICODE
            );
        } catch (Exception $error) {
            return response()->json(
                ['message' => $error->getMessage()],
                400,
                [],
                JSON_UNESCAPED_UNICODE
            );
        }
    }
}
