<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    protected $table = 'donatur';
    protected $fillable = [
        'user_id', 'name', 'email', 'phone', 'address', 'job', 'photo',
        'gender', 'type', 'status'
    ];
    use HasFactory;
}
