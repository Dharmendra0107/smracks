<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
    protected $fillable = [
        'name', 'phone', 'email', 'quantity', 'message',
        'product', 'company', 'delivery_city', 'rack_type', 'status', 'source',
    ];
}