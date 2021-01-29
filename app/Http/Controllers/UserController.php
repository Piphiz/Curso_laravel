<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Mail\TesteUnidev;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = new User();

        if($request->has('action') && $request->get('action') === 'search') {
            $users = $user->filterAll($request);
        } else {
            $users = $user->orderBy('created_at', 'desc')->paginate(10);
        }

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        try{
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);

            $user = new User();
            $user->create($data);

            $request->session()->flash('success', 'Registro Gravado com sucesso!');
        }catch(\Exception $e){
            $request->session()->flash('error', 'Ocorreu um erro ao tentar gravas esses dados!');
        }

        return redirect()->back();
    }

    public function show(User $user)
    {
        //
    }


    public function edit(Request $request, User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        try{
            $data = $request->all();
            if(empty($request->get('password'))){
                unset($data['password']);
            }else{
                if(Hash::check($data['actualPassword'], $user->password)){
                    $data['password'] = Hash::make($data['password']);
                }else{
                    unset($data['password']);
                    $request->session()->flash('error', 'Senha atual incorreta, os dados menos a senha foram atualizados');
                }
            }

            $user->update($data);

            $request->session()->flash('success', 'Registro atualizado com sucesso!');
        }catch(\Exception $e){
            $request->session()->flash('error', 'Ocorreu um erro ao tentar atualizar esses dados!');
        }

        return redirect()->back();
    }

    public function destroy(Request $request, User $user)
    {
        try{
            $user->delete();

            $request->session()->flash('success', 'Registro excluido com sucesso!');
        }catch(\Exception $e){
            $request->session()->flash('error', 'Ocorreu um erro ao tentar excluir esses dados!');
        }

        return redirect()->back();
    }
}
