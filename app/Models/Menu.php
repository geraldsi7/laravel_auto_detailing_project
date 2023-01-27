<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_id',
        'name',
        'description',
        'image',
        'price',
        'status'
    ];

    public function title()
    {
        return $this->belongsTo(Title::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }


}
