<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class PatientData extends Model
{
    use HasFactory;

    public function  getAgeAttribute($value)
    {
        $age = Carbon::parse($this->dob)->diff(Carbon::now())->y;
       // dd($age);
        return $age;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
