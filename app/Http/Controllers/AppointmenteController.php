<?php

namespace App\Http\Controllers;

use App\Interfaces\HorarioServiceInterface;
use App\Models\Appointment;
use App\Models\CancelledAppointment;
use App\Models\Specialty;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppointmenteController extends Controller
{


    public function index(){

        $role = auth()->user()->role;


        if($role == 'admin'){

             //consultas de veterinario
            $confirmedAppointments = Appointment::all()
            ->where('status','Confirmada');
            
            $pendigAppointments = Appointment::all()
            ->where('status','Reservada');

            $oldAppointments = Appointment::all()
            ->whereIn('status', ['Atendida','Cancelada']);
            
        
        }elseif($role == 'veterinario'){

            //consultas de veterinario
            $confirmedAppointments = Appointment::all()
            ->where('status','Confirmada')
            ->where('veterinario_id', auth()->id());

            $pendigAppointments = Appointment::all()
            ->where('status','Reservada')
            ->where('veterinario_id', auth()->id());

            $oldAppointments = Appointment::all()
            ->whereIn('status', ['Atendida','Cancelada'])
            ->where('veterinario_id', auth()->id());

        
        }elseif($role == 'cliente'){
        
            //consultas de cliente
            $confirmedAppointments = Appointment::all()
            ->where('status','Confirmada')
            ->where('client_id', auth()->id());

            $pendigAppointments = Appointment::all()
            ->where('status','Reservada')
            ->where('client_id', auth()->id());

            $oldAppointments = Appointment::all()
            ->whereIn('status', ['Atendida','Cancelada'])
            ->where('client_id', auth()->id());
        
        }

    return view('appointments.index',compact('confirmedAppointments','pendigAppointments','oldAppointments','role') );
    }

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

        return redirect('/miscitas')->with(compact('notification'));
    }

    public function cancel(Appointment $appointment, Request $request){
        if($request->has('justification')){
            $cancellation = new CancelledAppointment();
            $cancellation->justification = $request->input('justification');
            $cancellation->cancelled_by_id = auth()->id();
            $appointment->cancellation()->save($cancellation);
        
        }
        $appointment->status = 'Cancelada';
        $appointment->save();
        $notification = 'La cita ha cancelado correctamente.';

        return redirect('/miscitas')->with(compact('notification'));
    }

    public function formCancel(Appointment $appointment){
        if($appointment->status == 'Confirmada'){
            $role = auth()->user()->role;
            return view('appointments.cancel',compact('appointment','role'));
        }
            
    }

    public function show(Appointment $appointment){
        $role = auth()->user()->role;
        return view('appointments.show', compact('appointment','role'));    
    }


    public function confirm(Appointment $appointment ){

        $appointment->status = 'Confirmada';
        $appointment->save();
        $notification = 'La cita ha confirmo correctamente.';

        return redirect('/miscitas')->with(compact('notification'));
    }
    

}
