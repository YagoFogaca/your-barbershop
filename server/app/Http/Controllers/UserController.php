<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Página para criar um novo usuário.
     */
    public function create()
    {
        //
        return view('pages.user-create.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                "owner_name" => 'required',
                "company_name" => 'required',
                "email" => 'required|email|unique:users',
                "telephone" => 'required|min:11',
                "cep" => 'required',
                "address" => 'required',
                "number" => 'required',
                "neighborhood" => 'required',
                "city" => 'required',
                "state" => 'required',
                "complement" => 'nullable',
                "password" => 'required|confirmed|min:8',
            ],
            [
                "owner_name" => 'Nome do proprietário da empresa é obrigatório',
                "company_name" => 'Nome da empresa é obrigatório',
                "email" => 'Email já em uso',
                "telephone" => 'Telefone é obrigatório',
                "cep" => 'CEP é obrigatório',
                "address" => 'Rua é obrigatório',
                "number" => 'Númeroé obrigatório',
                "neighborhood" => 'Bairro é obrigatório',
                "city" => 'Cidade é obrigatório',
                "state" => 'Estado é obrigatório',
                "password" => 'Senha é inválida',
            ]
        );

        try {

            $user = [
                "owner_name" => $request->input('owner_name'),
                "company_name" => $request->input('company_name'),
                "email" => $request->input('email'),
                "telephone" => $request->input('telephone'),
                "cep" => $request->input('cep'),
                "address" => $request->input('address'),
                "number" => $request->input('number'),
                "neighborhood" => $request->input('neighborhood'),
                "city" => $request->input('city'),
                "state" => $request->input('state'),
                "complement" => $request->input('complement'),
                "password" => Hash::make($request->input('password'))
            ];

            $userCreated = User::create($user);
            if (!$userCreated) {
                throw new Exception('Ocorreu um erro ao criar o usuário');
            }

            $auth = Auth::attempt([
                "email" => $request->input('email'),
                "password" => $request->input('password')
            ]);

            if (!$auth) {
                throw new Exception('LOGIN_FAILED');
            }

            return response()->json('Usuário criado com sucesso', 200);
        } catch (Exception $error) {
            return response()->json($error->getMessage(), 404);
        }
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('platform.index');
        }
        return view('pages.user-login.index');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            "email" => 'required',
            "password" => 'required',
            'remember' => 'nullable',
        ]);

        try {
            $auth = Auth::attempt([
                "email" => $request->input('email'),
                "password" => $request->input('password')
            ], $request->input('remember'));

            if (!$auth) {
                throw new Exception('LOGIN_FAILED');
            }

            return response()->json(
                'Login_success',
                200
            );
        } catch (Exception $error) {
            return response()->json(
                ['message' => 'Email ou senha inválidos'],
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
