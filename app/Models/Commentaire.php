<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function offre(){
        return $this->belongsTo(Offre::class);
    }


    public function user(){
        return $this->belongsTo(User::class);
    }
    

 

}
