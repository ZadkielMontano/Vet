<?php namespace App\Services;

use App\Interfaces\HorarioServiceInterface;
use App\Models\Appointment;
use App\Models\Horarios;
use Carbon\Carbon;

class HorarioService implements HorarioServiceInterface {

    private function getDayFromDate($date){
        $dateCarbon = new Carbon($date);
        $i = $dateCarbon->dayOfWeek;
        $day = ($i==0 ? 6 : $i-1);
        return $day;
    }
    public function isAvailableInterval($date,$VetId, Carbon $start){
    
        $exists = Appointment::where('veterinario_id',$VetId)
        ->where('scheduled_date',$date)
        ->where('scheduled_time', $start->format('H:i:s'))
        ->exists();
        
        return !$exists;
    }

    public function getAvailableIntervals($date,$VetId){
    
        $horario = Horarios::where('active',true)
        ->where('day',$this->getDayFromDate($date))
        ->where('user_id', $VetId)
        ->first([
            'morning_start', 'morning_end',
            'afteroon_start', 'afteroon_end'
        ]);

        if(!$horario){
            return[];
        }
        $morningIntervalos = $this->getIntervalos(
            $horario->morning_start, $horario->morning_end, $VetId, $date
        );
        $afteroonIntervalos = $this->getIntervalos(
            $horario->afteroon_start, $horario->afteroon_end, $VetId, $date
        );

        $data = [];
        $data['morning'] = $morningIntervalos;
        $data['afteroon'] = $afteroonIntervalos;
        return $data;
    
    }


    private function getIntervalos($start,$end,$VetId,$date){
        $start = new Carbon($start);
        $end = new Carbon($end);
    
        $intervalos = [];
        while($start < $end){
            $intervalo = [];
            $intervalo['start'] = $start->format('g:i A');

            $available = $this-> isAvailableInterval($date,$VetId,$start);

            $start->addMinutes(30);
            $intervalo['end'] = $start->format('g:i A');

            if($available){

                $intervalos[] = $intervalo;
            
            }

    
        }
    
        return $intervalos;
    
    }

    
}