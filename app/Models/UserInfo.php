<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserInfo extends Model
{
    use HasFactory;

    protected $table='userinfos';

    protected $fillable = [
        'user_id',
        'user_firstname',
        'user_lastname'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
