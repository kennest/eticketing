<?php
/**
 * Created by PhpStorm.
 * User: kyle
 * Date: 11/12/17
 * Time: 14:58
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ClasseTicket extends Model
{
    protected $table='classes';

    public function evenement(){
        return $this->belongsTo(Evenement::class);
    }

}