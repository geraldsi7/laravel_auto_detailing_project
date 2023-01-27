<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'orderNumber',
        'name',
        'email',
        'phone_number',
        'vehicle',
        'description',
        'status'
    ];

    /*

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function services()
    {
        return $this->belongsTo(Services::class)->withTrashed();
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    */
}
