<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    protected $guarded = [];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }
}
