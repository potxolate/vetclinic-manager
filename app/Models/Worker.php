<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'dni',
        'clinic_id',
        'email',
        'phone',
    ];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
}
