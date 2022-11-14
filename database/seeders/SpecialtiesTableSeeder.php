<?php

namespace Database\Seeders;

use App\Models\Specialty;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialtiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialties = [
            'Cirugía ',
            'Rehabilitación ',
            'Vacunas',
            'Continuidad de revisión',
            'Estética',
            'Dental'
        ];
        foreach($specialties as $specialtyName){
          $specialty = Specialty::create([
            'name' => $specialtyName
            ]);
            $specialty->users()->saveMany(
                User::factory(3)->state(['role' => 'veterinario'])->make()
            );
        }
        User::find(3)->specialties()->save($specialty);
    }
}
