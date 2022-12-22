<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogPengeluaran extends Model
{
    use HasFactory;

    protected $table = 'log_pengeluaran';
    protected $fillable = [
        'user_id', 'type', 'activities'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
