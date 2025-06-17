<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Triages extends Model
{
    protected $fillable = [
        'name', 'priority_score', 'description'
    ];

    public function queues()
    {
        return $this->hasMany(PatientQueue::class);
    }
}
