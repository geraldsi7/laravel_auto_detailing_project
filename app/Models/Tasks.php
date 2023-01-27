<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    public function wash()
    {
        return $this->belongsTo(Wash::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
