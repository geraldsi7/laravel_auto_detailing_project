<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'services_id',
        'rate',
        'review'
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function services()
    {
        return $this->belongsTo(Services::class)->withTrashed();
    }
}
