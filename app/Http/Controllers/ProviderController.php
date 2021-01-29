<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProviderRequest;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index(Request $request)
    {
        $provider = new Provider();

        if($request->has('action') && $request->get('action') === 'search') {
            $providers = $provider->filterAll($request);
        } else {
            $providers = $provider->orderBy('created_at', 'desc')->paginate(10);
        }

        return view('providers.index', compact('providers'));
    }

    public function create()
    {
        return view('providers.create');
    }

    public function store(ProviderRequest $request)
    {
        try{
            $data = $request->all();

            $provider = new Provider();
            $provider->create($data);

            $request->session()->flash('success', 'Registro Gravado com sucesso!');
        }catch(\Exception $e){
            $request->session()->flash('error', 'Ocorreu um erro ao tentar gravas esses dados!');
        }

        return redirect()->back();
    }

    public function show(Provider $provider)
    {
        //
    }

    public function edit(Request $request, Provider $provider)
    {
        return view('providers.edit', compact('provider'));
    }

    public function update(ProviderRequest $request, Provider $provider)
    {
        try{
            $data = $request->all();
            $provider->update($data);

            $request->session()->flash('success', 'Registro atualizado com sucesso!');
        }catch(\Exception $e){
            $request->session()->flash('error', 'Ocorreu um erro ao tentar atualizar esses dados!');
        }

        return redirect()->back();
    }

    public function destroy(Request $request, Provider $provider)
    {
        try{
            $provider->delete();

            $request->session()->flash('success', 'Registro excluido com sucesso!');
        }catch(\Exception $e){
            $request->session()->flash('error', 'Ocorreu um erro ao tentar excluir esses dados!');
        }

        return redirect()->back();
    }
}
