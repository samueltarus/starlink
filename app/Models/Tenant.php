<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'phone_number',
        'email',
        'id_number',
        'password',
        'physical_address',
        'occupation_status',
        'at',
        'contact_person'
    ];
}
