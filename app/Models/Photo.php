<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    protected $guarded = [];

    protected $fillable = ['vehicule_id', 'photo'];

    public function voiture()
    {
        return $this->belongsTo(Vehicule::class);
    }



}
