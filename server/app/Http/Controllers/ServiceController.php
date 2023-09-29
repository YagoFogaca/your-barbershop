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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
