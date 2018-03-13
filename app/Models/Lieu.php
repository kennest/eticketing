<?php
/**
 * Created by PhpStorm.
 * User: kyle
 * Date: 11/12/17
 * Time: 14:59
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Lieu extends Model
{
    protected $table='lieux';

    public function evenement(){
        return $this->hasMany(Evenement::class);
    }

}