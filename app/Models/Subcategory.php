<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'name',
        'link',
    ];

    public function category()
    {
    	return $this->belongsTo(Category::class)->withTrashed();
    }

    public function services()
    {
        return $this->hasMany(Services::class);
    }
}
