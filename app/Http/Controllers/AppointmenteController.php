<?php

namespace App\Http\Controllers;

use App\Interfaces\HorarioServiceInterface;
use App\Models\Appointment;
use App\Models\Specialty;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppointmenteController extends Controller
{
    public function create(HorarioServiceInterface $horarioServiceInterface){

        $specialties = Specialty::all();

        $specialtyId = old('specialty_id');
        if($specialtyId){
            $specialty = Specialty::find($specialtyId);
            $vet = $specialty->users;
        }else{
            $vet = collect();
        }
        $date = old('scheduled_date');
        $VetId = old('veterinario_id');
        if($date && $VetId){
            $intervals = $horarioServiceInterface->getAvailableIntervals($date,$VetId);
        }else{
            $intervals = null;
        }


    
    return view('appointments.create',compact('specialties','vet','intervals'));

    }

    public function store(Request $request,HorarioServiceInterface $horarioServiceInterface){

        $rules = [
            'scheduled_time' => 'required',
            'type' => 'required',
            'description' => 'required',
            'veterinario_id' => 'exists:users,id',
            'specialty_id' => 'exists:specialties,id'
        ];

        $messages= [
            'scheduled_time.required' => 'Debe seleccionar una hora valida.',
            'type.required' => 'Debese seleccionar el tipo de cita.',
            'description.required' => 'Coloque una breve descripción del estado del animalito'
        ];


        $validator = Validator::make ($request->all(), $rules, $messages);

        $validator->after(function ($validator) use ($request, $horarioServiceInterface) {

            $date = $request->input('scheduled_date');
            $VetId = $request->input('veterinario_id');
            $scheduled_time = $request->input('scheduled_time');
            if($date && $VetId && $scheduled_time){
                $start = new Carbon($scheduled_time);
            }else{
                return;
            }


            if (!$horarioServiceInterface->isAvailableInterval($date, $VetId, $start)) {
                $validator->errors()->add(
                    'available_time', 'La hora seleccionada fue seleccionada por otro cliente'
                );
            }
        });



        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = $request->only([
        
        'scheduled_date',
        'scheduled_time',
        'type',
        'description',
        'veterinario_id',
        'specialty_id',   
        
        ]);
        $data['client_id'] = auth()->id();

        $carbonTime = Carbon::createFromFormat('g:i A', $data['scheduled_time']);
        $data['scheduled_time'] = $carbonTime->format('H:i:s');

        Appointment::create($data);

        $notification = 'El registro se realizó correctamente.';

        return back()->with(compact('notification'));
    
    
    }
}
