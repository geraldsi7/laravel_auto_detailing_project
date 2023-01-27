<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'school_id'
    ];

      public function school()
    {
        return $this->belongsTo(School::class);
    }

     public function faculty()
    {
        return $this->HasMany(Faculty::class);
    }
}
