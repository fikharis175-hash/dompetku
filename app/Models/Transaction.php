<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\type;

class Transaction extends Model
{
    protected $fillable = [
        'type',
        'amount',
        'category',
        'description',
        'transaction_date',
    ];
}
