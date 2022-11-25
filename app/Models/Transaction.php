<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = "transactions";
    protected $fillable = [
        'reservation_id',
        'provider',
        'token',
        'payer',
    ];
    protected $hidden = [
        'updated_at',
    ];

    public function reservation(){
        return $this->hasOne(Reservation::class);
    }
}
