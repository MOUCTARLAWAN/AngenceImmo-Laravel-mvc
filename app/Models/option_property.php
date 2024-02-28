<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class option_property extends Model
{
    use HasFactory;
    protected $fillable = [
        'option_id',
        'property_id'
    ];
}