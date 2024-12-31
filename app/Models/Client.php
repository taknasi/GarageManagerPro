<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'type',
        'civility',
        'full_name',
        'phone',
        'email',
        'notes',
        'company_name',
        'legal_form',
        'contact_person',
        'cin',
        'rc_number',
        'ice',
        'address',
        'city'
    ];
}
