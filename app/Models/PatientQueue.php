<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientQueue extends Model
{
    protected $fillable = [
        'date', 'time', 'triage_id', 'patient_id', 'status', 'state','queue'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function triage()
    {
        return $this->belongsTo(Triages::class);
    }
}
