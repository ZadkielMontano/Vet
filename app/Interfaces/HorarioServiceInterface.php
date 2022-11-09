<?php namespace App\Interfaces;

use Carbon\Carbon;

interface HorarioServiceInterface {

public function isAvailableInterval($date,$vetId, Carbon $start);
public function getAvailableIntervals($date,$vetId);

}

