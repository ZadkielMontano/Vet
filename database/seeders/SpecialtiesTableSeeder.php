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
            'Cirugía / Perro',
            'Cirugía / Gato',
            'Cirugía / Tortuga',
            'Cirugía / Hámster',
            'Cirugía / Conejo',
            'Cirugía / Hurón',
            'Rehabilitación / Perro',
            'Rehabilitación / Gato',
            'Rehabilitación / Tortuga',
            'Rehabilitación / Hámster',
            'Rehabilitación / Conejo',
            'Rehabilitación / Hurón',
            'Vacunas / Perro',
            'Vacunas / Gato',
            'Vacunas / Tortuga',
            'Vacunas / Hámster',
            'Vacunas / Conejo',
            'Vacunas / Hurón',
            'Continuidad de revisión / Perro',
            'Continuidad de revisión / Gato',
            'Continuidad de revisión / Tortuga',
            'Continuidad de revisión / Hámster',
            'Continuidad de revisión / Conejo',
            'Continuidad de revisión / Hurón',
            'Estética / Perro',
            'Estética / Gato',
            'Estética / Tortuga',
            'Estética / Hámster',
            'Estética / Conejo',
            'Estética / Hurón',
            'Ultrasonido / Perro',
            'Ultrasonido / Gato',
            'Ultrasonido / Tortuga',
            'Ultrasonido / Hámster',
            'Ultrasonido / Conejo',
            'Ultrasonido / Hurón',
            'Dental / Perro',
            'Dental / Gato',
            'Dental / Tortuga',
            'Dental / Hámster',
            'Dental / Conejo',
            'Dental / Conejo'

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
