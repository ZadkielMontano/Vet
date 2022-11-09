<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Specialty;
use App\Http\Controllers\Controller;

class SpecialityController extends Controller
{

    

    public function index()
    {
        $specialties = Specialty::all();
        return view('specialties.index', compact('specialties'));
    }

    public function create()
    {
        return view('specialties.create');
    }

    public function sendData(Request $request)
    {
        //validaciones 
        $rules = [
            'name' => 'required|min:3'
        ];

        $messages = [
            'name.required' => 'El nombre de la especialidad es obligatorio.',
            'name.min' => 'El nombre de la especialidad debe tener más de 3 caracteres'
        ];

        $this->validate($request, $rules, $messages);

        //mostrar datos en la tabla especialidades
        $specialty = new Specialty();
        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save();
        $notification ='La categoria se a creado correctamente';

        return redirect('/especialidades')->with(compact('notification'));
    }

    public function edit(Specialty $specialty)
    {
        return view('specialties.edit', compact('specialty'));
    }

    public function update(Request $request, Specialty $specialty)
    {
        //validaciones 
        $rules = [
            'name' => 'required|min:3'
        ];

        $messages = [
            'name.required' => 'El nombre de la especialidad es obligatorio.',
            'name.min' => 'El nombre de la especialidad debe tener más de 3 caracteres'
        ];

        $this->validate($request, $rules, $messages);

        //mostrar datos en la tabla con los cambios
        $updateName=$specialty->name;
        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save();
        $notification ='La categoria '.$updateName.' se actualizo correctamente';

        return redirect('/especialidades')->with(compact('notification'));
    }

    public function destroy(Specialty $specialty){
        $deleteName=$specialty->name;
        $specialty->delete();
        $notification='La categoria '.$deleteName .' se elimino correctamente';

        return redirect('/especialidades')->with(compact('notification'));
    
    }
}
