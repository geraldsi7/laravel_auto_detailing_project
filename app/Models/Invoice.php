<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;

      protected $fillable = [
        'services_id',
    ];

    public function services()
    {
        return $this->belongsTo(Services::class)->withTrashed();
    }
}
