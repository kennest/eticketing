<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table="categories";
    protected $fillable=['categorie'];
    
    public function types()
    {
        return $this->hasMany(TypeEvenement::class);
    }
}
