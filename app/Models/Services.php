<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Services extends Model
{
    use HasFactory;

    use SoftDeletes;

     protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'year',
        'make',
        'model',
        'type',
        'description'
    ];

    /*
    public function user()
    {
    	return $this->belongsTo(User::class)->withTrashed();
    }

    public function city()
	{
		return $this->belongsTo(City::class);
	}

	 public function category()
	{
		return $this->belongsTo(Category::class)->withTrashed();
	}

     public function photo()
    {
        return $this->hasMany(photo::class);
    }

	 public function rating()
    {
        return $this->hasMany(Rating::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class)->withTrashed();
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

*/

}
