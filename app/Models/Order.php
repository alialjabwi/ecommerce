<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'country',
        'first_name',
        'last_name',
        'company_name',
        'address',
        'apartment',
        'city',
        'state',
        'postcode',
        'email',
        'phone',
        'total',
        'order_notes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
