<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable=['name','profession'];
    protected $table='participants';

    public function evenements()
    {
        return $this->belongsToMany(Evenement::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
