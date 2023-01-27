<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Photo extends Model
{
    use HasFactory, SoftDeletes;

        protected $fillable = [
        'services_id',
        'image'
    ];

    public function services()
    {
       return $this->belongsTo(Services::class);
    }
}
