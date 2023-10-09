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
     * Display user information.
     */
    public function index(string $id)
    {
        $user = User::find($id);
        return view('pages.account-setup.index', ['user' =>  $user]);
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

            return response()->json(
                'Usuário criado com sucesso',
                200,
                [],
                JSON_UNESCAPED_UNICODE
            );
        } catch (Exception $error) {
            return response()->json(
                $error->getMessage(),
                404,
                [],
                JSON_UNESCAPED_UNICODE
            );
        }
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('services.index');
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
            $auth = Auth::attempt(["email" => $request->input('email'), "password" => $request->input('password')], $request->input('remember'));

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

    public function logout()
    {
        Auth::logout();
        return response()->redirectToRoute('users.login');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Atualização da senha
     */
    public function password(Request $request)
    {
        //
        $request->validate(
            [
                'password' => 'required|confirmed|min:8',
                'user_id' => 'required'
            ],
        );

        try {
            $data = [
                "user_id" => $request->input('user_id'),
                'password' => Hash::make($request->input('password')),
            ];
            $user = User::find($data['user_id']);
            if (!$user) {
                throw new Exception("Usuário não foi encontrado", 1);
            }

            $userUpdated = $user->update(['password' => $data['password']]);
            if (!$userUpdated) {
                throw new Exception("Senha não foi atualizada", 2);
            }

            return response()->json([
                "success" => true,
                "response" => [
                    "message" => 'Senha atualizada com sucesso'
                ]
            ], 200, [], JSON_UNESCAPED_UNICODE);
        } catch (Exception $error) {
            return response()->json([
                "error" => true,
                "response" => [
                    "message" => 'Informações invalidas',
                ]
            ], 400, [], JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate(
            [
                "owner_name" => 'nullable|min:3',
                "company_name" => 'nullable|min:3',
                "email" => 'nullable|email|unique:users',
                "telephone" => 'nullable|min:11',
                "cep" => 'nullable|min:8',
                "address" => 'nullable',
                "number" => 'nullable',
                "neighborhood" => 'nullable',
                "city" => 'nullable',
                "state" => 'nullable',
                "complement" => 'nullable',
                "password" => 'nullable|min:8',
            ],
            [
                "owner_name" => 'Nome do proprietário inválido',
                "company_name" => 'Nome da empresa inválido',
                "email" => [
                    'unique' => 'Email já em uso',
                    'email' => 'Formato inválido'
                ],
                "telephone" => 'Telefone inválido',
                "cep" => 'CEP inválido',
                "address" => 'Rua inválido',
                "number" => 'Número inválido',
                "neighborhood" => 'Bairro inválido',
                "city" => 'Cidade inválida',
                "state" => 'Estado inválido',
                "password" => 'Senha inválido',
            ]
        );

        try {
            $user = $request->all();
            $userUpdate = User::find($id);
            if (!$userUpdate) {
                throw new Exception("Usuário não foi encontrado", 1);
            }

            $userUpdated = $userUpdate->update($user);
            if (!$userUpdated) {
                throw new Exception("Usuário não foi atualizado", 2);
            }

            return response()->json([
                "success" => true,
                "response" => [
                    "data" => $userUpdate,
                    "message" => 'Usuário atualizado com sucesso'
                ]
            ], 200, [], JSON_UNESCAPED_UNICODE);
        } catch (Exception $error) {
            //throw $th;
            return response()->json([
                "error" => true,
                "response" => [
                    "message" => 'Informações invalidas'
                ]
            ], 400, [], JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
