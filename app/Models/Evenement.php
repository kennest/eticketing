<?php
/**
 * Created by PhpStorm.
 * User: kyle
 * Date: 11/12/17
 * Time: 14:56
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    protected $table='evenements';

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function type()
    {
        return $this->belongsTo(TypeEvenement::class);
    }

    public function classeTickets()
    {
        return $this->hasMany(ClasseTicket::class);
    }

    public function lieu()
    {
        return $this->belongsTo(Lieu::class);
    }

    public function participants()
    {
        return $this->belongsToMany(Participant::class);
    }

    //Scopes
    public function scopeActive($query)
    {
        return $query->where('statut', '=', 1);
    }

    public function scopeInactive($query)
    {
        return $query->where('statut', '=', 0);
    }
}
