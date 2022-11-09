<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;


class ClientController extends Controller
{
    public function index()
    {
        $client = User::client()->paginate(6);
        return view('client.index', compact('client'));
    }


    public function create()
    {
        return view('client.create');
    }


    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'cedula' => 'required|min:8',
            'address' => 'nullable|min:6',
            'phone' => 'required|min:10',
        ];
        $messages = [
            'name.required' => 'El nombre del cliente es obligatorio',
            'name.min' => 'El nombre del cliente debe tener minimo 3 caracteres',
            'email.required' => 'El campo correo es obligatorio',
            'email.email' => 'Ingresa un correo válido',
            'cedula.required' => 'El campo cédula es obligatorio',
            'cedula.min' => 'La cédula debe tener al menos 5 digitos',
            'address.min' => 'La dirección debe tener al menos 6 caracteres',
            'phone.required' => 'El número de teléfono es obligatorio',
            'phone.min' => 'El número de teléfono debe tener minimo 10 digitos',
        ];
        $this->validate($request, $rules, $messages);

        User::create(
            $request->only('name', 'email', 'cedula', 'address', 'phone')
                + [
                    'role' => 'cliente',
                    'password' => bcrypt($request->input('password'))
                ]
        );
        $notification = 'El cliente se registro correctamente';
        return redirect('/clientes')->with(compact('notification'));
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {

        //client es el scoup
        $client = User::Client()->findOrFail($id);
        return view('client.edit', compact('client'));
    }


    public function update(Request $request, $id)
    {
    
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'cedula' => 'required|min:8',
            'address' => 'nullable|min:6',
            'phone' => 'required|min:10',
        ];
        $messages = [
            'name.required' => 'El nombre del cliente es obligatorio',
            'name.min' => 'El nombre del cliente debe tener minimo 3 caracteres',
            'email.required' => 'El campo correo es obligatorio',
            'email.email' => 'Ingresa un correo válido',
            'cedula.required' => 'El campo cédula es obligatorio',
            'cedula.min' => 'La cédula debe tener al menos 5 digitos',
            'address.min' => 'La dirección debe tener al menos 6 caracteres',
            'phone.required' => 'El número de teléfono es obligatorio',
            'phone.min' => 'El número de teléfono debe tener minimo 10 digitos',
        ];
        $this->validate($request, $rules, $messages);
        $user= User::Client()->findOrFail($id);

        $data=$request->only('name', 'email', 'cedula', 'address', 'phone');
        $password=$request->input('password');

        if($password)
        $data['password'] = bcrypt($password);

        $user->fill($data);
        $user->save();

        $notification = 'La información se modificó correctamente';
        return redirect('/clientes')->with(compact('notification'));
    
    }


    public function destroy($id)
    {
        
        $user = User::Client()->findOrFail($id);
        $ClienteName = $user->name; 
        $user->delete();

        $notification = "El Cliente $ClienteName se elimino correctamente";

        return redirect('/clientes')->with(compact('notification'));
    }
}
