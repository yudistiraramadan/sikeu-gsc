<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // protected $table = 'detail_user';
    protected $fillable = [
        'id', 'role_name',
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
