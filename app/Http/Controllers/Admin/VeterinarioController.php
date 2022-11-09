<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Specialty;

class VeterinarioController extends Controller
{

    public function index()
    {
        $vet = User::veterinario()->paginate(6);
        return view('vet.index', compact('vet'));
    }


    public function create()
    {
        $specialties = Specialty::all();
        return view('vet.create', compact('specialties'));
    }


    public function store(Request $request)
    {

        
        //validación de campos veterinario
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'cedula' => 'required|min:8',
            'address' => 'nullable|min:6',
            'phone' => 'required|min:10',
        ];
        $messages = [
            'name.required' => 'El nombre del veterinario es obligatorio',
            'name.min' => 'El nombre debe tener minimo 3 caracteres',
            'email.required' => 'El campo correo es obligatorio',
            'email.email' => 'Ingresa un correo válido',
            'cedula.required' => 'El campo cédula es obligatorio',
            'cedula.min' => 'La cédula debe tener al menos 5 digitos',
            'address.min' => 'La dirección debe tener al menos 6 caracteres',
            'phone.required' => 'El número de teléfono es obligatorio',
            'phone.min' => 'El número de teléfono debe tener minimo 10 digitos',
        ];
        $this->validate($request, $rules, $messages);

        $user = User::create(
            $request->only('name', 'email', 'cedula', 'address', 'phone')
            + [
                'role'=> 'veterinario',
                'password'=> bcrypt($request->input('password'))
                ]
        );
        $user->specialties()->attach($request->input('specialties'));
      

        $notification = 'El veterinario se registro correctamente';
        return redirect('/veterinarios')->with(compact('notification'));
    
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //veterinario es el scoup
        $vet = User::veterinario()->findOrFail($id);

        $specialties = Specialty::all();
        $specialty_ids = $vet->specialties()->pluck('specialties.id');


        return view('vet.edit',compact('vet','specialties','specialty_ids'));
    }

    public function update(Request $request, $id){

        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'cedula' => 'required|min:8',
            'address' => 'nullable|min:6',
            'phone' => 'required|min:10',
        ];
        $messages = [
            'name.required' => 'El nombre del veterinario es obligatorio',
            'name.min' => 'El nombre debe tener minimo 3 caracteres',
            'email.required' => 'El campo correo es obligatorio',
            'email.email' => 'Ingresa un correo válido',
            'cedula.required' => 'El campo cédula es obligatorio',
            'cedula.min' => 'La cédula debe tener al menos 5 digitos',
            'address.min' => 'La dirección debe tener al menos 6 caracteres',
            'phone.required' => 'El número de teléfono es obligatorio',
            'phone.min' => 'El número de teléfono debe tener minimo 10 digitos',
        ];
        $this->validate($request, $rules, $messages);
        $user= User::veterinario()->findOrFail($id);

        $data=$request->only('name', 'email', 'cedula', 'address', 'phone');
        $password=$request->input('password');

        if($password)
        $data['password'] = bcrypt($password);

        $user->fill($data);
        $user->save();
        $user->specialties()->sync($request->input('specialties'));

        $notification = 'La información se modificó correctamente';
        return redirect('/veterinarios')->with(compact('notification'));
    }


    public function destroy($id){

        $user = User::veterinario()->findOrFail($id);
        $vetName = $user->name; 
        $user->delete();

        $notification = "El veterinario $vetName se elimino correctamente";

        return redirect('/veterinarios')->with(compact('notification'));

        
    }
}
