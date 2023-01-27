<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Budget extends Model
{
    use HasFactory, SoftDeletes;



     protected $fillable = [
        'budget',
        'user_id',
        'description',
        'amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
}
