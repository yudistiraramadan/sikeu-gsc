<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $table = 'pengeluaran';
    protected $fillable = [
        'user_id', 'name_pengaju', 'name_penerima', 'address', 'nominal', 'terbilang', 'keterangan', 'date', 'signature'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
