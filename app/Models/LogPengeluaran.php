<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogPengeluaran extends Model
{
    use HasFactory;

    protected $table = 'log_pengeluaran';
    protected $fillable = [
        'pengeluaran_id', 'type', 'activities'
    ];

    public function pengeluaran()
    {
        return $this->belongsTo(Pengeluaran::class);
    }
}
