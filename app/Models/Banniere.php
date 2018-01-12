<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banniere extends Model
{
    protected $table='bannieres';
    protected $fillable=['picture','event_id','description'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
