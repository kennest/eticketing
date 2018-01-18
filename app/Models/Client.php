<?php
/**
 * Created by PhpStorm.
 * User: kyle
 * Date: 11/12/17
 * Time: 14:55
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table='clients';
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
