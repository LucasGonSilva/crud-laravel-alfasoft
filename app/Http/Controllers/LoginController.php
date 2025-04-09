<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function loginProcess(LoginRequest $request)
    {
        $request->validated();

        $authenticated = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        if(!$authenticated) {
            return back()->withInput()->with('error', 'E-mail ou senha inválido!');
        }

        $user = Auth::user();
        $user = User::find($user->id);

        return redirect()->route('user.index');
    }

    public function create()
    {
        return view('login.create');
    }

    public function store(UserRequest $request)
    {
        $request->validated();

        DB::beginTransaction();

        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]);

            DB::commit();

            return redirect()->route('login')->with('success', 'Usuário cadastrado com sucesso!');

        } catch (\Exception $th) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Usuário não cadastrado!');
        }
    }

    public function destroy()
    {
        Auth::logout();

        return redirect()->route('login')->with('success', 'Deslogado com sucesso!');
    }
}
