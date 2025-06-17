<?php
// database/seeders/TriageSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Triages;

class TriageSeeder extends Seeder
{
    public function run()
    {
        $triages = [
            [
                'name' => 'Cardiac arrest',
                'priority_score' => 100,
                'description' => 'Patient is in cardiac arrest and requires immediate CPR.'
            ],
            [
                'name' => 'Severe trauma with bleeding',
                'priority_score' => 95,
                'description' => 'Massive bleeding from trauma, requires rapid intervention.'
            ],
            [
                'name' => 'Respiratory distress',
                'priority_score' => 90,
                'description' => 'Breathing difficulty with saturation <90%.'
            ],
            [
                'name' => 'Chest pain, suspected MI',
                'priority_score' => 85,
                'description' => 'Possible myocardial infarction, ECG and enzyme evaluation needed.'
            ],
            [
                'name' => 'Stroke symptoms (FAST)',
                'priority_score' => 80,
                'description' => 'Facial droop, arm weakness, speech difficulty. Suspected stroke.'
            ],
            [
                'name' => 'Severe asthma attack',
                'priority_score' => 75,
                'description' => 'Patient wheezing and unable to complete sentences.'
            ],
            [
                'name' => 'Febrile seizure',
                'priority_score' => 60,
                'description' => 'Seizure due to high fever, usually in pediatric patients.'
            ],
            [
                'name' => 'Severe abdominal pain',
                'priority_score' => 50,
                'description' => 'Requires further diagnostic workup for differential causes.'
            ],
            [
                'name' => 'Vomiting with mild dehydration',
                'priority_score' => 30,
                'description' => 'Patient can tolerate oral rehydration.'
            ],
            [
                'name' => 'Mild cold symptoms',
                'priority_score' => 10,
                'description' => 'Patient stable and can wait. Minimal symptoms.'
            ]
        ];

        foreach ($triages as $triage) {
            Triages::create($triage);
        }
    }
}
