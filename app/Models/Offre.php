<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category(){

        return $this->belongsTo(category::class);
    }

    public function commentaires(){

        return $this->hasMany(Commentaire::class);
    }


   public function reservations(){
      return $this->hasMany(reservations::class);
   }


}
