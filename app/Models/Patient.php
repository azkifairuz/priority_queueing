<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    
    protected $fillable = [
        'full_name', 'address', 'gender', 'podb',
        'occupation', 'nik', 'age'
    ];

    public function queues()
    {
        return $this->hasMany(PatientQueue::class);
    }
}
