<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surname', 'clinic_id', 'mail', 'phone'];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
}
