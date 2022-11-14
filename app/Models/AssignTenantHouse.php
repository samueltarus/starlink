<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignTenantHouse extends Model
{
    use HasFactory;
    protected $fillable = [
        'apartment_name',
        'house_name',
        'montly_rent',
        'tenant_id',
        'tenant_name',
        'deposit_amount',
        'placement_date'
    ];
}
