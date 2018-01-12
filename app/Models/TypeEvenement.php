<?php
/**
 * Created by PhpStorm.
 * User: kyle
 * Date: 11/12/17
 * Time: 15:00
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeEvenement extends Model
{
    protected $table='types';
    protected $fillable=['type','categorie_id'];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
