<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
       'entry',
       'amount',
       'user_id',
    ];

    public function userCreator() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
