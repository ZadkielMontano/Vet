<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function appointments(){
        
        $monthCounts =  Appointment::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(1) as count'))
                ->groupBy('month')
                ->get()
                ->toArray();

            $counts = array_fill(0, 12, 0);
            foreach($monthCounts as $monthCount){
            
                $index = $monthCount['month']-1;
                $counts[$index] = $monthCount['count'];

            }
            

    
    return view('charts.appointments',compact('counts'));
    
    }

public function vets(){
    $now = Carbon::now();
    $end =$now->format('Y-m-d');
    $start = $now->subMonth('2')->format('Y-m-d');

    return view('charts.vets',compact('end','start'));

}

public function vetsJson(Request $request){


    $start = $request->input('start');
    $end = $request->input('end');

    $vets = User::Veterinario()
    ->select('name')
    ->withCount(['attendedAppointments'=> function($query) use ($start, $end){
        $query->whereBetween('scheduled_date',[$start, $end]);
    },
    'cancellAppointments'=> function($query) use ($start, $end){
        $query->whereBetween('scheduled_date',[$start, $end]);
    }
    ])
    ->orderBy('cancell_appointments_count','desc')
    ->take(6)
    ->get();
    

    $data = [];
    $data ['categories'] = $vets->pluck('name');

    $series = [];
    $series1['name'] = 'Citas atendidas';
    $series1['data'] = $vets->pluck('attended_appointments_count');
    $series2['name'] = 'Citas canceladas';
    $series2['data'] = $vets->pluck('cancell_appointments_count');

    $series[] = $series1;
    $series[] = $series2;
    $data['series'] = $series;

    return $data;

    }

}
