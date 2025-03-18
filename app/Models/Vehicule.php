<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearch($query, $search)
    {
        return $query
            ->Where('marque', 'like', '%' . $search . '%')
            ->orWhere('modele', 'like', '%' . $search . '%')
            ;
    }
}
