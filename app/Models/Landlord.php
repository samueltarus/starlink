<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Landlord extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_name',
        'other_names',
        'id_number',
        'email',
        'phone_number',
        'password',
        'physical_address'
    ];

}
