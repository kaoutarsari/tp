<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function addContact($name, $email, $comments, $subject){
        return Contact::create([
            'name' => $name,
            'email' => $email,
            'comments' => $comments,
            'subject' => $subject,
        ]);
    }

}
